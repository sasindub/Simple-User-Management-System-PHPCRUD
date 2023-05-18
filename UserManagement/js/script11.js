$(document).ready(function(){
   
var id = 0;

    displayData();
    //display function
    function displayData(){
     
        $.ajax({
            url:"ajax.php",
            type: 'post',
            data: {
                type: 'display'
            },
            success:function(data, status){
                $('#tb').html(data);
            }
        });
    }

 


  $(document).on('click','.del',function(e){
    const id = this.id;
    

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        data: {
            id:id,
            type:'delete'
        },
        success:function(data, status){
            displayData();
        }
    });

  });

  $(document).on('click','.up',function(e){
    const id = this.id;
    setId(id);

    $.ajax({
        url: 'ajax.php',
        type: 'post',
        data: {
            id:id,
            type:"update"
        },
        success: function(data, status){
            var dat = JSON.parse(data);
                $('#userHead').html(dat[0].slice(0,5));
                $('#uname').val(dat[0]);
                $('#uaddress').val(dat[1]);
                $('#uemail').val(dat[3]);
                $('#umobile').val(dat[2]);
            
        }
    });
  });

  function setId(id){
    this.id = id;
  }

  function getId(){
return this.id;
  }


  $('#updateform').on('submit', function(e){
    e.preventDefault();

    let name = $('#uname').val();
    let email = $('#uemail').val();
    let address = $('#uaddress').val();
    let mobile = $('#umobile').val();

    $.ajax({
        url:'ajax.php',
        type: 'post',
        data: {
            name:name,
            email:email,
            address:address,
            mobile:mobile,
            type:"updateSubmit",
            id:getId(id)
        },
        success: function(data, status){
            alert(data);
            displayData();
        }   
    });
    
  });

  $("#srch").on('click', function(e){
        const search = $('#search').val();
        

        $.ajax({
            url:'ajax.php',
            type:'post',
            data:{
                search:search,
                type:'search'
            },
            before:function(){
                alert("Searching..");
            },
            success:function(data,status){
                alert(data);
                $('#tb').html(data);
            }
        });

  });


    $("#addform").on("submit",function(e){
        e.preventDefault();
        //getting all the inputs values

        let name = $("#name").val();
        let email = $('#email').val();
        let tp = $('#mobile').val();
        let address = $('#address').val();

        

       $.ajax({
        url:"ajax.php",
        type: 'post',
        data: {
            name: name,
            email: email,
            tp: tp,
            address: address,
            type: 'insert'
        },
        beforeSend: function(){
            //alert("Loading...");
        },
        success: function(data, status){
           
            displayData(); 
            document.getElementById("addform").reset();
           
        }

       });
        

    });
});