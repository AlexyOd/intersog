<template>
	
	
	<el-container>
		
		<el-header class="custom-header">Dashboard</el-header>
		<el-main class="custom-main">
			
			<el-container>
				
				<el-header class="custom-header">SuperName</el-header>
				<el-main class="custom-main">
					
					<!--<el-card class="box-card custom-card">-->
					
					<el-checkbox-group  v-model="socselect">
						<el-checkbox-button v-for="social in socials" :label="social" :key="social">{{social}}
						</el-checkbox-button>
					</el-checkbox-group>
					<div>
						
						<el-tabs ref="tabs" v-model="tabactive" @tab-click="tabclick">
							<template v-for="tab in tabs">
								<el-tab-pane :label="tab" :name="tab">{{tab}}</el-tab-pane>
							</template>
						</el-tabs>
					</div>
				
					
					
					<!--</el-card>-->
				
				
				</el-main>
				
			</el-container>
			
			
			
		</el-main>
		
	</el-container>
	

</template>

<script>
    export default {
        props: ['tmedia'],
        name: "Home",
        data() {
            return {
                socselect: ['instagramm'],
                tabactive: 'panding',
                socials: [
                    'instagramm', 'youtube', 'facebook', 'twitter'
                ],
                tabs: [
                    'panding',
                    'approved',
                    'rejected'
                ]

            };
        },
        methods: {
            tabclick(tab, event) {
            

            }
        },
        mounted: function () {
            // `this` указывает на экземпляр vm
            debugger;

        }
    }
</script>

