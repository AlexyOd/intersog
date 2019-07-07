<template>
	<el-row>
		<template v-for="tcard in tmedia ">
			
			<el-col  :xs="24" :sm="12" :md="8" :xl="6" v-if="isSocial(tcard.social_network) && isKeyword(tcard.caption) && isTabactive(tcard) ">
				<el-card class="box-card mcard">
					<div class="mcard-header clearfix">
						<div class="avatar">
							<img :src="tcard.author_pic" @error="errorImg($event,'defAvatar')" alt="">
						</div>
						<div class="text">
							<p class="mcard-name">
								@{{tcard.author_username}}
							</p>
							<a class="mcard-link" :href="tcard.link"> {{tcard.social_network}} </a>
						</div>
					
					</div>
					<div class="mcard-content">
						<div class="mcard-shape">
							{{tcard.caption}}
						</div>
						<img :src="tcard.pic" @error="errorImg($event,'defpic')" alt="">
					</div>
					<div class="mcard-counter clearfix">
						<div>
							<p class="lable">
								likes
							</p>
							<p class="counter">{{getRandoom()}}</p>
						</div>
						<div>
							<p class="lable">
								comments
							</p>
							<p class="counter">{{getRandoom()}}</p>
						</div>
					</div>
					<div class="mcard-footer">
						<button class="mcard-btn black"
						v-if="rules.tabactive !='rejected' " @click.stop="reject(tcard)">reject</button>
						<button class="mcard-btn blue"
						v-if="rules.tabactive !='approved' " @click.stop="approve(tcard)">approve</button>
					</div>
				
				</el-card>
			
			
			</el-col>
		
		
		</template>
	</el-row>


</template>

<script>
    import axios from 'axios';

    export default {
        props: ['tmedia', 'rules', 'keyword'],
        data() {
            return {
                defAvatar: '../img/defavatar.png',
                defpic: '../img/noimage.jpg',
	            /*footerbtn:['reject','approve',]*/
            }
        },
        methods: {
            isSocial(snetwork) {
                return this.rules.socselect.some((el) => {
                    return snetwork.toUpperCase() == el.toUpperCase();
                });
            },
            errorImg(event, req) {
                event.target.src = this[req];
            },
            isKeyword(caption) {
                var self = this;//regexp = new RegExp('[a-zA-Z]|[0-9]');
                if (!this.keyword.length) return true;

                return caption.split(' ').some((str) => {
                    /*let strreg = regexp.test(str);*/

                    return self.keyword.some((search) => {
                        /*let searchreg = regexp.test(search);*/
                        /*if(searchreg != strreg) return false;*/
                        /*if(!searchreg)
                        {
                            return str.split('').some((e)=>{
                                return search.split('').some((s)=>{
                                    return e == s
                                })
                            })
                        }*/

                        return str.toLowerCase() == search.toLowerCase();
                    })
                })


            },
            getRandoom() {
                return Math.round(Math.random() * (1000 - 1) + 1);
            },
            reject(item){
                 item.status = 'rejected';
                 console.log(item,this,item.status);
                 this.$forceUpdate();
                 
            },
            approve(item){
                 item.status = 'approved';
                 console.log(item,this,item.status);
                 this.$forceUpdate();
                 
            },
            isTabactive(item){
                if(this.$props.rules.tabactive == 'panding') return true;
                if(this.$props.rules.tabactive == item.status ){
                    return true;
                }
                else{
                    return false;
                }
            }
        },
        created() {
        
	       
			
        },


    }
</script>

<style lang="scss">
	@import '~element-ui/packages/theme-chalk/src/common/var';
	@import '../../sass/_variables.scss';
	
	$avasize: 50px;
	.posacenter {
		position: absolute;
		top: 0;
		left: -100%;
		right: -100%;
		bottom: 0;
		margin: auto;
		height: 100%;
		width: auto;
		
	}
	
	.mcard {
		&-header {
			display: flex;
			.avatar {
				width: $avasize;
				height: $avasize;
				min-width: $avasize;
				border-radius: 50%;
				position: relative;
				overflow: hidden;
				img {
					@extend .posacenter
				}
				
			}
			.text {
				flex: 1 1 auto;
				padding-left: 5px;
			}
		}
		&-name {
			margin-bottom: 0;
			font-weight: bold;
			font-size: 14px;
		}
		&-link {
			text-decoration: underline;
			font-size: 14px;
			color:$--color-primary;
			
		}
		&-content {
			position: relative;
			
			overflow: hidden;
			position: relative;
			height: 420px;
			margin: 10px;
			margin-left: -20px;
			margin-right: -20px;
			img {
				@extend .posacenter
			}
		}
		&-shape {
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			background-color: rgba(154, 154, 154, 0.9);
			z-index: 2;
			
			padding: 20px;
			text-transform: uppercase;
			color: $white;
			overflow: auto;
			opacity: 0;
			transition: all .3s;
			&:hover {
				opacity: 1;
			}
		}
		&-counter {
			display: flex;
			padding-left: 20px;
			padding-right: 20px;
			margin-left: -20px;
			margin-right: -20px;
			border-bottom: 1px solid $bdcolor;
			& > div {
				flex: 1 1 50%;
				
				
			}
			.lable {
				text-transform: uppercase;
				color: $lbcolor;
				font-size: 14px;
				margin-bottom: 0;
				font-weight: bold;
			}
			.counter {
				color: $black;
				font-size: 20px;
				font-weight: bold;
				
			}
		}
		&-btn{
			text-transform: uppercase;
			font-size: 20px;
			font-weight: bold;
			background-color: transparent;
			border: 0;
			color:$specblack;
			width: 100px;
			margin-top: 10px;
			&.blue{
				color: $--color-primary;
			}
		}
		
	}

</style>