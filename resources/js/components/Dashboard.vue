<template>
    <div> 
        <div class="container-fluid">
            <!---------------Table one---------->
            <div class="_1adminOverview_table_recent_box_shadow_border_radius_mar_b30_p20">
                <p class="title0"><Button @click="addModal=true"><Icon type="md-add" />Dashboard</Button></p>
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
                          <Button type="info" size="small">Info</Button>
                          <Button type="error" size="small">Error</Button>
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