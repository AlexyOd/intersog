<template>
	<div class="mcard-loop">
		<div class="mcard-loop-top">
			<p class="mcard-total">
				  {{getCount()||0}} items total
			</p>
			<div class="mcard-pagination">
				<el-pagination
						background
						layout="prev, pager, next"
						:total="getCount()||0">
				</el-pagination>
			</div>
		</div>
		<el-row>
			<template v-for="tcard in tmedia ">
				<el-col :xs="24" :sm="12" :md="8" :xl="6" v-if="checkItem(tcard)">
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
								        v-if="rules.tabactive !='rejected' " @click.stop="reject(tcard)">reject
							</button>
							<button class="mcard-btn blue"
							        v-if="rules.tabactive !='approved' " @click.stop="approve(tcard)">approve
							</button>
						</div>
					
					</el-card>
				
				
				</el-col>
			</template>
		</el-row>
	</div>
</template>

<script>
    

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
         
            errorImg(event, req) {
                event.target.src = this[req];
            },
            getRandoom() {
                return Math.round(Math.random() * (1000 - 1) + 1);
            },
            reject(item) {
                item.status = 'rejected';


            },
            approve(item) {
                item.status = 'approved';
            },
            checkItem(item){
                
                let res = this.isTabactive(item) && this.isSocial(item.social_network) && this.isKeyword(item.caption);
                
                return res;
            },
            isTabactive(item) {
                if (this.$props.rules.tabactive == 'panding') return true;
                if (this.$props.rules.tabactive == item.status) {
                    return true;
                }
                else {
                    return false;
                }
            },
            isKeyword(caption) {
                var self = this;
                if (!this.keyword.length) return true;
                return caption.split(' ').some((str) => {
                    return self.keyword.some((search) => {
                        return str.toLowerCase() == search.toLowerCase();
                    })
                })
            },
            isSocial(snetwork) {
                return this.rules.socselect.some((el) => {
                    return snetwork.toUpperCase() == el.toUpperCase();
                });
            },
            getCount(){
                
                if(!this.$props.tmedia) return false;
                let counter =0;
                const self=this;
                self.$props.tmedia.forEach((e)=>{
                    if(self.checkItem(e))counter++
                });
	            return counter;
            }
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
			color: $--color-primary;
			
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
		&-btn {
			text-transform: uppercase;
			font-size: 20px;
			font-weight: bold;
			background-color: transparent;
			border: 0;
			color: $specblack;
			width: 100px;
			margin-top: 10px;
			&.blue {
				color: $--color-primary;
			}
		}
		&-loop {
			background-color: $--background-color-base;
			margin-left: -20px;
			margin-right: -20px;
			&-top{
				padding: 5px 10px;
				display: flex;
				
			}
		}
		&-pagination{
			margin-left: auto;
		}
		
	}

</style>