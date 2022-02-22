<template>
    <div> 
        <div class="container-fluid">
            <!---------------Table one---------->
            <div class="_1adminOverview_table_recent_box_shadow_border_radius_mar_b30_p20">
                <p class="title0"><Button @click="addModal=true"><Icon type="md-add" />Add Tag</Button></p>
            </div>
            <div class="_overflow_table_div">
                <table class="table">
                    <!--------------table title---->
                    <tr>
                      <th>ID</th>
                      <th>TAG NAME</th>
                      <th>CREATED AT</th>
                      <th>ACTION</th>        
                    </tr>
                    <!--------------ENDtable title---->

                    <!-------ITEMS-------->
                    <tr>
                      <td>1</td>
                      <td class="_table_name">michael art center </td>
                      <td>Economy</td>
                     


                      <td>
                          <Button type="info" size="small"><router-link to="/management" style="color:white">Management</router-link></Button>
                          <Button type="error" size="small"><router-link to="/developer" style="color:white">Developer</router-link></Button>
                          <Button type="success" size="small"><router-link to="/dashboard" style="color:white;">dashboard</router-link></Button>
                            <Button type="primary" size="small"><router-link to="/users" style="color:white;">users</router-link></Button>
                            <Button type="primary" size="small"><router-link to="/profile" style="color:white">profile</router-link></Button>
                                    
                      </td>        
                    </tr>
                </table>
            </div>
            <!---------tag  modal----->
            <modal  v-model="addModal" title="addtag" :mask-closable="false" :closable="false">
                <p>content of a dialogue</p>
                <p>content of a dialogue</p>
                <div slot="footer">
                   <Button type="default" @click="addModal=false">Close</Button>
                   <Button type="primary" > Add tag</Button>
                </div>
            </modal>
              <router-view></router-view>
        </div>
    </div>
</template>
<script>
export default {
   
    data(){
        return{
            data : {
                tagName:''
            },
            addModal:false,
            isAdding:false,
        }
    },

  





 
}
</script>