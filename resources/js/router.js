import Vue from 'vue'
import  Router from 'vue-router'
Vue.use(Router)
import firstpage from './components/pages/first-route'

const routes=[{
    path:'/my-new-vue-route',
    component:firstpage
}]

export default new Router({
    
    mode:'history',
    routes
})


