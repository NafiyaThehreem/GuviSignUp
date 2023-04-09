const validation =new JustValidate("#register");
validation
      .addField("#email",[
      {
        rule:"required"
      },
      {
        rule:"email"
      },
      // {
      //   validator:(value)=>()=>{
      //     return fetch("php/register.php?email="+encodeURIComponent(value))
      //     .then(function(response){
      //       return response.json();
      //     })
      //     .then(function(json){
      //       return json.available;
      //     });
      //   },
      //   errorMessage:"email already taken"
      // }
  ])
      .addField("#password",[
    {
      rule:"required"
    },
    {
      rule:"password"
    }
  ]);
  // .onSuccess((event)=>{
  //   document.getElementById("signup").submit();
  //   window.location.replace("http://localhost/guvi/login.html");
  // });
