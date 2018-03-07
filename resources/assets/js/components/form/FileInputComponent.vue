<template>
    <vue-transmit 
        class="col-12" 
        v-bind="options"
        tag="section"
        upload-area-classes="box-placeholder"
        ref="uploader"
        @complete="complete"
        @added-file	="addedFile"
    >
          <div @click="triggerBrowse" class="text-center">{{$t('form.drag_'+this.allowedTypes.split('/')[0]+'_file'+(this.maxFiles>1?'s':''))}}</div>
          <!-- Scoped slot -->
        <template slot="files" slot-scope="props" >
            <div v-for="(file, i) in props.files" :key="file.id" :class="{'mt-5': i === 0}">
                <div class="media text-center">
                    <img :src="file.dataUrl" class="img-fluid d-flex mr-3">
                    <h6>{{ file.name }}</h6>
                    <div class="progress progress-xs" >
                        <div class="progress-bar bg-success" :style="{width: file.upload.progress + '%'}"></div>
                    </div>
                </div>
            </div>
        </template>
        <br/>
      <!-- <div v-bind="errorMessages"></div>-->
        <br/>
        <div v-for="(file, i) in $parent.form.data.media" :key="file.id" v-show="!file.deleted" :class="{'mt-5': i === 0}" >
            <div class="media text-center" >
                <div :class="{'bg-danger':file.deleted}" v-html="renderFile(file.name,file.url)"></div>
                <h6 class="ltr">
                    {{ file.name }}
                </h6>
                <a @click="file.deleted?restoreFile(i,file):deleteFile(i,file)" href="javascript:void(0)" class="btn " :class="{'btn-danger':!file.deleted,'btn-success':file.deleted}">
                    <i class="fa" :class="{'fa-trash':!file.deleted,'fa-check-square':file.deleted}"></i>
                </a>
            </div>
        </div>
        </vue-transmit>


</template>

<script>
    export default {
        created(){
            this.options.url = this.url ? this.url : this.$api.video_upload;
            this.options.headers={'Authorization':this.$auth.getTokenBearer()};
        },
        props: {
            allowedTypes: { type: [Array,String], default:'image/*' },
            maxFiles: { type: Number, default:1 },
            maxFileSize: { type: Number, default:100 },
            url:{type: String, default: ''},
        },
        data(){
            return {
                options: {
                    acceptedFileTypes: [this.allowedTypes],
                    url: '',
                    clickable: false,
                    maxFiles: 99999,
                    maxFileSize:this.maxFileSize,
                    errorMessages:"",
                    //accept:this.accept
                },
            }
        },
        methods: {
            triggerBrowse() {
                this.$refs.uploader.triggerBrowseFiles()
            },
            complete(e){
                if(e.xhr) {
                    let length=0;
                    for(let i=0;i<this.$parent.form.data.media.length;i++)
                        if(typeof(this.$parent.form.data.media[i].deleted)=="undefined"||this.$parent.form.data.media[i].deleted==false)
                            length++;
                    if(length<this.maxFiles) {
                        let response=JSON.parse(e.xhr.response);
                        let file={url:response.url,name:response.name};
                        if(typeof(this.$parent.form.data.media.length)=="string")Vue.set(this.$parent.form.data.media,[]);
                        Vue.set(this.$parent.form.data.media, this.$parent.form.data.media.length, file);
                    }
                    this.$refs.uploader.removeFile(e);
                    this.$refs.uploader.$refs.hiddenFileInput.value="";
                }
            },
            addedFile(e){
                let length=0;
                for(let i=0;i<this.$parent.form.data.media.length;i++)
                    if(typeof(this.$parent.form.data.media[i].deleted)=="undefined"||this.$parent.form.data.media[i].deleted==false)
                        length++;
                if(length>=this.maxFiles) {
                    this.$parent.form.errors.record([new Array(this.$t("form.max_file_reached"))]);
                    this.$refs.uploader.removeFile(e);
                    this.$refs.uploader.$refs.hiddenFileInput.value="";
                }
            },
            renderFile(fileName, fileUrl){
                let ext = fileName.split('.').slice(-1)[0].toLowerCase();
                if (['jpg', 'png', 'bmp', 'jpeg', 'gif'].indexOf(ext) >= 0)
                    return '<img style="width:300px;max-height:200px"src="' + fileUrl + '"/>'
                else if (['mp4', 'avi', 'mkv', 'ogg', 'wmv', '3gp'].indexOf(ext) >= 0)
                    return '<video style="width:300px;max-height:200px" controls> <source src="' + fileUrl + '" type="video/'+ext+'"> </video>'
                else return '<object style="width:300px;max-height:200px" data="'+fileUrl+'" type="application/'+ext+'">'+
                            '<a href="'+fileName+'">'+fileName+'</a>'+
                        '</object>';
            },
            deleteFile(i,file){
                this.$parent.form.errors.clear();
                if(typeof(file.id)!="undefined") {
                    file.deleted = true;
                    Vue.set(this.$parent.form.data.media, i, file);
                }else {
                    Vue.set(this.$parent.form.data.media, this.$parent.form.data.media.splice(i,1));
                }
            },
            restoreFile(i,file){
                file.deleted=false;
                Vue.set(this.$parent.form.data.media, i, file);
            },
        },
        filters: {
            json(value) {
                return JSON.stringify(value, null, 2)
            }
        }
  }
</script>
