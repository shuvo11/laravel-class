<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>File Upload By axious</title>
</head>
<body>
    
<div class="container">
    <div class="row" style=" margin-top:100px">
        <div class="col p-10">
       
<label for="formFileLg" class="form-label">Large file input example</label>
<input class="form-control form-control-lg" type="file" id="file" />

  <div class="input-group-append">
    <button onClick="onupload()" id="uploadID" class="btn btn-outline-secondary" type="button">Upload file</button><br>
   
  </div>
</div>
<h5 id="uploadID"></h5>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>




<script>

    function onupload(){



        let myfile = document.getElementById("file").files[0];
        let myfileName =myfile.name;
        let myfilesize =myfile.size
        let myfileformat =myfileName.split('.').pop();

    let FileData = new FormData();
    FileData.append('FileKey',myfile)

    let config ={ 
        
        header:{'content-type': 'multipart/form-data'},

        onUploadProgress:function(progressEvent) {
      let percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
      let uploadMB =(progressEvent.loaded * 100)/(1028*1028);
      let totalMB =(progressEvent.total)/(1028*1028);

      let dueMB =uploadMB-totalMB;

     $('#uploadID').html("Upload:"+uploadMB.toFixed(2)+ "Due:"+dueMB.toFixed(2)+ "Total"+totalMB.toFixed(2));
            
    }
}

    let url='/fileup';

    axios.post(url,FileData,config)
    .then(function(response){

        if(response.status==200){
            $('#uploadID').html('upload sucess');

            setTimeout(function() {
                $('#uploadID').html(" sucess ");
            }, 5000);
        }
        else{
            $('#uploadID').html('fail file');
            setTimeout(function() {
                $('#uploadID').html(" sucess ");
            }, 5000);
        }

    }).catch(function(error){

        $('#uploadID').html('fail file');
        setTimeout(function() {
                $('#uploadID').html("sucess ");
            }, 5000);
    })

    }
   
</script>

</body>
</html>