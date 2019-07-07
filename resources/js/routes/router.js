const Home = resolve => {
    require.ensure(['../components/Home.vue'], () => {
        resolve(require('../components/Home.vue'))
    });
};
export const routes = [
    {
        path: '/',
        component: Home,
    }
];