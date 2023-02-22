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
       
<div class="input-group">
  <div class="custom-file">
    <input type="file" id="file" class="custom-file-input" id="inputGroupFile04">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
  <div class="input-group-append">
    <button onClick="onupload()" id="uploadID" class="btn btn-outline-secondary" type="button">Upload file</button>
  </div>
</div>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>




<script>

    function onupload(){

        let spinner ="<div class='spinner-grow' role='status'></div>";

        $('#uploadID').html(spinner);

        let myfile = document.getElementById("file").files[0];
        let myfileName =myfile.name;
        let myfilesize =myfile.size
        let myfileformat =myfileName.split('.').pop();

    let FileData = new FormData();
    FileData.append('FileKey',myfile)

    let config ={ header:{'content-type': 'multipart/form-data'}}

    let url='/fileup';

    axios.post(url,FileData,config)
    .then(function(response){

        if(response.status==200){
            $('#uploadID').html('upload sucess');

            setTimeout(function() {
                $('#uploadID').html('upload');
            }, 3000);
        }
        else{
            $('#uploadID').html('fail file');
            setTimeout(function() {
                $('#uploadID').html('upload');
            }, 3000);
        }

    }).catch(function(error){

        $('#uploadID').html('fail file');
        setTimeout(function() {
                $('#uploadID').html('upload');
            }, 3000);
    })

    }
   
</script>

</body>
</html>