<style>
.widget-user-header{
  background-position:center center; 
  background-size:cover;
  height:250px;
}
</style>
</style>
<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-widget widget-user">
          <!--- Add the background color to the header using any of the bg-* classes-->
          <div class="widget-user-header text-white" style="background-image:url('./images/photo1.png');">
            <h6 class="wiget-user-username" style="color:black;">awotundun michael</h6>
            <h6 class="widget-user-desc" style="color:black;">web developer</h6>
          </div>
        </div>
         <!-- image section-->
        <div class="widget-user-image">
          <img class="img-circle"  alt="user avatar">
        </div>

        <div class="card-footer">
          <div class="row">
            <div class="col-sm-4 border-right">
             <div class="description-block">
              <h5 class="description-header">3200</h5>
              <span class="description-text">sales</span>
             </div>
             <!-- description block-->
            </div>

            <!-- column section for product and 35-->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header">35</h5>
                <span class="descrtion-text">product</span>
              </div>
            </div>
             <!-- column section 13000-->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header">13000</h5>
                <span class="description-text">followers</span>
              </div>
            </div>
          </div>
        </div>
        <!-- form-->
        <form method="POST" enctype="multipart/form-data">
          <Button type="default" size="small">Activity</Button>
          <Button type="primary" size="small">Settings</Button>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="name" class="col-sm-12 control-label">Name</label>
              <input type="text" v-model="form.name" class="form-control form-control-sm col-md-9" id="name" max="255" placeholder="kindly enter your name ">
           </div>
          </div>
          
          <div class="col-sm-12">
              <div class="form-group">
                <label for="email" class="col-sm-12 control-label">Email</label>
                <input type="text" v-model="form.email" class="form-control form-control-sm col-md-9" id="email" max="255" placeholder="kindly enter your email">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label for ="experience" class="col-sm-12 control-label">Experience</label>
                <textarea id="experience" class="form-control form-control-sm col-md-9" max="255" placeholder="whats on your mind"></textarea>
              </div>
            </div>


            <div class="col-md-12">
              <div class="custom-file">
               <label for ="ImageUpload" class="custom-file-label">choose an image</label>
               <input type="file" @change="updateprofile" id="imageupload" class="custom-file-input" max="255" placeholder="image upload">
              </div>
              <!-- image preview section-->
            <div v-if="imagepreview" class="mt-2">
              <img :src="imagepreview" class="figure-img img-fluid rounded" style="max-height:100px;">
            </div>
              <Button type="submit" @click.prevent="updateinfo" size="small" class=" btn btn-success mt-4">Upload</Button>
            </div>
        </form>
          
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform';
 export default{
   data(){
     return{
       image:null,
       imagepreview:null,
       form: new Form ({
               id:'',
              name: '',
              email: '',
              password: '',
              bio: '',
              type: '',
              photo: '',
          })
     }
   },
   mounted(){
     console.log('component mounted.');
   },
   methods:{
     updateinfo(){
       let data= new FormData;
      data.append ('image',this.image);
       axios.post('api/profile/',this.image)
       .then(()=>{

       })
       .catch(()=>{

       });
     },
     updateprofile(e){
       //console.log('event is uploading');
       this.image = e.target.files[0];

       let reader= new FileReader();
       reader.readAsDataURL(this.image);
       reader.onload = e => {
         this.imagepreview=e.target.result;
       };
       //this aspect isto  convert the pictures to string on the form being used.
       reader.onloadend=(e)=>{
        this.form.photo=reader.result;
       };

     }

   },
   created(){
      axios.get("api/profile")
      .then(({data})=>(this.form.fill(data)));
   }
 }
</script>
