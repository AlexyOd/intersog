<template>
	
	<div class="container-fluid " :class="{'loading':timeload}">
		<div>
			
			<router-view :tmedia="data.media"></router-view>
			
			
			
		</div>
		
		<!--</transition-group>-->
	
	</div>
</template>

<script>
    import {Loading} from 'element-ui';

    import axios from 'axios';

    export default {
        data() {
            return {
                spinner: '',
                loading: true,
                counter: 0,
	            data:[],
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
	    
	    methods:{
            callData : async function (){
               /* let promise = new Promise((resolve, reject) => {
                    setTimeout(() => resolve(fdata), 1000)
                });*/
				
                await axios.post('/getInfo')
                    .then(res=>{
                        this.data = res.data;
                    });
            }
	    }

    }
</script>
<style lang="scss">
	@import '~element-ui/packages/theme-chalk/src/common/var';
	@import '../../sass/_variables.scss';
	
	
	body {
		background-color: $--background-color-base;
		
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
	
	.custom {
		&-header {
			@extend .cShadow;
			@extend .h1;
			font-weight: bold;
			font-size: 16px;
			display: flex;
			align-items: center;
			background-color: $white;
		}
		&-main {
			background:$--background-color-base;
			padding-top: 0;
			padding-bottom: 0;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		&-card{
			margin-bottom: 10px;
		}
	}
</style>