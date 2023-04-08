const validation =new JustValidate("#register");
validation
      .addField("#name",[
        {
          rule:"required"
        }
      ])
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
      .addField("#pass1",[
    {
      rule:"required"
    },
    {
      rule:"password"
    }
  ])
  .addField("#pass2",[
    {
      validator:(value,fields)=>{
        return value === fields["#pass1"].elem.value;
      },
      errorMessage: "Passwords should match"
    }
  ]);
  // .onSuccess((event)=>{
  //   document.getElementById("signup").submit();
  //   window.location.replace("http://localhost/guvi/login.html");
  // });
