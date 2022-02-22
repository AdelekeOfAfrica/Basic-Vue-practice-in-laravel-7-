<template>
    <div> 
        <div class="container-fluid">
            <!---------------Table one---------->
            <div class="_1adminOverview_table_recent_box_shadow_border_radius_mar_b30_p20">
                <button type="button" class="btn btn-default" @click="newModal">
                    Add user
                </button>
            </div>
            

            
            <div class="_overflow_table_div">
                <table class="table">
                    <!--------------table title---->
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>EMAIL</th>
                      <th>TYPE</th>
                      <th>REGISTERED AT</th> 
                      <th>MODIFY</th>   
                             
                    </tr>
                    <!--------------ENDtable title---->

                    <!-------ITEMS-------->
                    <tr v-for="user in users" :key="user.id">
                      <td>{{user.id}}</td>
                      <td class="_table_name">{{user.name}}</td>
                      <td>{{user.email}}</td>
                      <td>{{user.userType|upText}}</td>
                      <td>{{user.created_at|mydate}}</td>
                      <td> 
                        <!--<Button type="default" data-toggle="modal" data-target="#exampleModal" v-on:click="editmodal(user)">Edit</Button>-->
                         <Button type="default" @click="editModal(user)">Edit</Button> 
                        <Button type="info" v-on:click="deleteUser(user.id)"> Delete</Button>
                      </td>   
                    </tr>
                </table>
            </div>
            <!---------tag  modal----->
           <!-------- <modal  v-model="addModal" title="addtag" :mask-closable="false" :closable="false">
                  
                      <label>username</label>
                      <input v-model="form.username" type="text" name="username" class="form-control" :class="{'is-valid':form.errors.has('username')}">
                      <has-error :form="form" field="username"></has-error>

                    
                <p>content of a dialogue</p>
                <div slot="footer">
                   <Button type="default" @click="addModal=false">Close</Button>
                   <Button type="primary" @click="addTag"> Add tag</Button>
                </div>
            </modal>--->
            <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" v-show="!editmode" id="exampleModalLabel" >Add User</h5>
        <h5 class="modal-title" v-show="editmode" id="exampleModalLabel">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="editmode ? updateuser(): createUser()">
        <div class="modal-body">
              <div class="form-group">
                  <input v-model="form.name" type="text" name="name" class="form-control" placeholder="Kindly enter your username" :class="{'is-invalid': form.errors.has('name') }">
                  <has-error :form="form" field="name"></has-error>
              </div>

              <div class="form-group">
                  <input v-model="form.email" type="text" name="email" class="form-control" placeholder="Kindly enter your email" :class="{'is-invalid': form.errors.has('email') }">
                  <has-error :form="form" field="email"></has-error>
              </div>

              

              <div class="form-group">
                  <textarea v-model="form.bio" type="text" name="bio" class="form-control" placeholder="short bio for user (optional)" :class="{'is-invalid': form.errors.has('bio') }"></textarea>
                  <has-error :form="form" field="bio"></has-error>
              </div>

              <div class="form-group">
                  <select v-model="form.type" type="text" name="type" class="form-control" placeholder="user category" :class="{'is-invalid': form.errors.has('email') }">
                  <option value="">Select User Role</option>
                  <option value="admin">Admin</option>
                  <option value="user">User</option>
                  <option value="author">Author</option>
                  </select>
                  <has-error :form="form" field="email"></has-error>
              </div>
              <div class="form-group">
                  <input v-model="form.password" type="password" name="password" class="form-control" placeholder="password" :class="{'is-invalid': form.errors.has('password') }">
                  <has-error :form="form" field="password"></has-error>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button v-show="!editmode" type="submit"  class="btn btn-primary">Add user </button>
          <button v-show="editmode" type="submit"  class="btn btn-success">update info</button>
        </div>
      </form>
  </div>
</div>
    </div>
  </div>
</div>
        </div>
    </div>
</template>
<script>
  import Form from 'vform'; 
export default {
    data(){
        return{
          editmode:false,
             users:{},
          form: new Form ({
               id:'',
              name: '',
              email: '',
              password: '',
              bio: '',
              type: '',
              photo: ''

          })
        }
    },
    methods:{
      updateuser(){
       this.form.put('api/user/'+this.form.id)
      .then(()=>{})
      .catch(()=>{
      });
      
      },
       editModal(user){
         this.editmode=true;
      this.form.reset();
      $('#exampleModal').modal('show');
      this.form.fill(user);
    },
      newModal(){
        this.editmode=false;
        this.form.reset();
        $('#exampleModal').modal('show');
        
      },
      deleteUser(id){
        swal.fire({
          'title':'Are you sure',
          'text':'you wont be able to reverse it',
          'type':'warning',
          'showCancelButton':true,
          'confirmButtonColor':'#3085d6',
          'cancelButtonColor':'#d33',
          'confirmButtonText':'Yes,Delete it'}).then((result)=>{
            //send request to the server
              this.form.delete('api/user/'+id).then(()=>{
                swal.fire(
                  'Deleted!',
                  'your user information has been deleted',
                  'success'
                )

              }).catch(()=>{
                swal.fire("failed!","something went wrong","warning");
              })
          })
      },

      loadUser(){
        axios.get('api/user').then(({data})=> (this.users = data.data));
      },
      createUser(){
        
        this.form.post('api/user');
        fire.$emit('3sec');

        toast.fire({
          type:'success',
          title:'user created successfully'
        });
        
      }
    },
    created(){
      this.loadUser();
       fire.$on('3sec',()=>{
         this.loadUser();
       });
      setInterval(()=> this.loadUser(),3000)
    },
    updateUser(){
      this.form.put('api/user/'+this.form.id)
      .then(()=>{})
      .catch();
    }

}
</script>
