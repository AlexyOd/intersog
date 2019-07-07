<template>
	
	<div class="container-fluid " :class="{'loading':timeload}">
		<div>
			
			
			<el-container>
				
				<el-header class="custom-header">Dashboard</el-header>
				<el-main class="custom-main">
					
					
					<el-container>
						
						<el-header class="custom-header">SuperName</el-header>
					</el-container>
				</el-main>
				
				
				<el-container>
					<el-main class="custom-main">
						<el-card class="box-card custom-card fullwidth ">
							
							<el-checkbox-group class="custom-checkbox-group" v-model="socselect">
								<el-checkbox-button v-for="social in socials" :label="social" :key="social">
									{{social}}
								</el-checkbox-button>
							</el-checkbox-group>
							
							<div class="unpadign">
								<el-tabs class="custom-tabs" ref="tabs" v-model="tabactive" @tab-click="tabclick">
									<template v-for="tab in tabs">
										<el-tab-pane :label="tab" :name="tab">
											
											<div class="tab-cont" v-if="tab == 'panding' ">
												<div class="btn-group" v-if="keywords.length">
													<template v-for="(btn,index) in keywords" >
														<el-button type="info" round>
															{{btn}}
															<i class="el-icon-close" @click.stop="remove( index )"></i>
														</el-button>
													
													</template>
												</div>
												<div class="input-holder">
													<el-input ref="keywordinput" placeholder="+ keyword"
													          v-model="keyword"
													          v-on:keyup.native="ikeywordChange"></el-input>
													
													<el-button type="primary">FILTER</el-button>
												</div>
											</div>
											<card :tmedia="data.media" :rules="rules" :keyword="keywords" />
										</el-tab-pane>
									</template>
								</el-tabs>
							</div>
						
						</el-card>
					</el-main>
				</el-container>
			</el-container>
		
		
		</div>
		
		<!--</transition-group>-->
	
	</div>
</template>

<script>
    import {Loading} from 'element-ui';
    import card from '../components/card'

    import axios from 'axios';

    export default {
        data() {
            return {
                spinner: '',
                loading: true,
                counter: 0,
                data: [],
                keywords: [],
                keyword: '',

                socselect: ['instagram'],
                socials: [
                    'instagram', 'youtube', 'facebook', 'twitter'
                ],

                tabactive: 'panding',
                tabs: [
                    'panding',
                    'approved',
                    'rejected'
                ]
            };
        },
        computed: {
            timeload: function () {

                if (this.counter == 300) {
                    this.spinner.close();
                    return false;
                } else {
                    return true;
                }
            },
            rules: function () {
                return {'socselect': this.socselect,'tabactive':this.tabactive};
            }
        },
        created() {

            this.spinner = Loading.service({
                //target:'',
                body: true,
                fullscreen: true,
                lock: true,
                text: '' + this.counter,
                background: '#ccc',
                customClass: '.spinner-custom',
            })
        },
        async mounted() {
            let self = this;
            var loadingTime = setInterval(function () {
                self.counter += 100;
                self.spinner.text = self.counter / 1000;
                if (self.counter == 300) {
                    clearInterval(loadingTime)
                }
            }, 100);
           
            await this.callData();


        },
        methods: {
            callData: async function () {

				console.log('build');
                await axios.post('/getInfo')
                    .then(res => {
                        res.data.media.forEach((item) => {
                            if(!item.hasOwnProperty('status')){
                                item.status = 'null';
                            }
                        });
                        this.data = res.data;
                        
                    });
            },
            tabclick(tab, event) {

                this.$forceUpdate();
            },
            remove(item) {
                this.keywords.splice(item, 1);
            },
            ikeywordChange(e) {
                
                e.keyCode == 32 || e.keyCode == 13 ? this.genKeywords() : false;
            },
            genKeywords() {
                
                let word = this.keyword.replace(/\s/g, '');
                if (!word.length) return false;
                this.keywords.push(word);
                this.keyword = "";
                this.$refs.keywordinput[0].getInput().value = "";


            }


        },
        components: {
            card
        }


    }
</script>
<style lang="scss">
	@import '~element-ui/packages/theme-chalk/src/common/var';
	@import '../../sass/_variables.scss';
	
	body {
		background-color: $--background-color-base;
		
	}
	[class*=el-col-] {
		padding: 15px;
	}
	
	.loading {
		display: none;
	}
	
	.cShadow {
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
	}
	
	.el-card.is-always-shadow {
		@extend .cShadow;
	}
	
	.h1 {
		font-size: 14px;
		font-weight: bold;
		
	}
	
	.fullwidth {
		width: 100%;
	}
	
	.unpadign {
		margin-left: -20px;
		margin-right: -20px;
	}
	
	.custom {
		&-header {
			@extend .cShadow;
			@extend .h1;
			font-weight: bold;
			font-size: 16px;
			display: flex;
			align-items: center;
			background-color: $white;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		&-main {
			background: $--background-color-base;
			padding-top: 0;
			padding-bottom: 0;
			
		}
		&-card {
			margin-bottom: 10px;
		}
		&-tabs {
			.el-tabs {
				&__item {
					width: 100%;
					text-align: center;
					text-transform: uppercase;
					height: 50px;
					line-height: 50px;
				}
				&__content {
					padding-left: 20px;
					padding-right: 20px;
					
				}
				&__header {
					margin-bottom: 0;
				}
			}
		}
		&-checkbox-group {
			.el-checkbox-button__inner {
				text-transform: uppercase;
			}
		}
		&-card {
			margin-bottom: 10px;
		}
	}
	
	.tab-cont {
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		margin-left: -20px;
		margin-right: -20px;
		padding: 0 3px;
		margin-top:1px;
		
		
		.btn-group {
			flex: 0 0 auto;
			display: flex;
			flex-wrap: wrap;
			max-width: 100%;
			margin-right: 10px;
			button{
				margin-top: 5px;
				margin-bottom: 5px;
				padding: 5px 10px;
				
			}
		}
		.input-holder {
			flex: 1 1 auto;
			display: flex;
			min-width: 300px;
			.el-input__inner{
				border: 0;
			}
		}
	}
</style>