import Axios from "axios"
import { data } from "jquery"

export default{
    data(){
        return{

        }
    },
    methods:{
        callApi(method,url,dataobj){
            try{
                Axios({
                    url:url,
                    method:method,
                    data:dataObj

                });

            }catch(error){

            }
        }

    }
}