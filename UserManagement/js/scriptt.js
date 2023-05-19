$(document).ready(function(){
   
var id = 0;

   
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
            getusers();
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
          
            getusers();
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
           
            getusers();
            document.getElementById("addform").reset();
           
        }

       });
        

    });

    function getusers(){
        const pageno = $("#pageno").val();
        $.ajax({
            url:"ajax.php",
            type: "post",
            data:{
                type:"getusers",
                pageno:pageno
            },
            success:function(data,status){
                var a = $.parseJSON(data)
            
                $("#tb").html(a[0]);

                let totaluser = a[1];


                let totalpages=Math.ceil(parseInt(totaluser/10));
                const currentPages=$("#pageno").val();
                pagination(totalpages, currentPages);

            }
            ,
            error:function(request, error){
                alert(error);
                console.log(arguments);
            }
        });
    }

    function pagination(totalpages, currentPages){
        var pagelist = "";

        if(totalpages>1){
            currentPages=parseInt(currentPages);
            pagelist+=` <ul class="pagination justify-content-center">`;

            const prevClass=currentPages==1?"disabled":"";

            pagelist+=` <li class="page-item ${prevClass}"><a class="page-link" href="#" data-page="${currentPages-1}" id="${currentPages-1}">Prevouse</a></li> `;

            for(let p=1; p<=totalpages;p++){
                const activeClass=currentPages==p?"active":"";
            pagelist+=`<li class="page-item"><a class="page-link" href="#" id="${p}" data-page="${p}">${p}</a></li>`;
            }

            const nextClass=currentPages==totalpages?"disabled":"";

            pagelist+=`  <li class="page-item ${nextClass}"><a class="page-link" id="${currentPages+1}" href="#" data-page="${currentPages+1}">Next</a></li> `;


            pagelist+=`</ul>`;
        }

        $("#pagination").html(pagelist);
    }

    $(document).on('click', 'ul.pagination li a', function(e){
        e.preventDefault();
        const pagenum = this.id;
        $("#pageno").val(pagenum);
        getusers();
        $("#"+pagenum).parent().siblings().removeClass("active");
        $("#"+pagenum).parent().addClass("active");
    });


    getusers();

});