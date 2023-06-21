const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar"),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
      link = document.querySelectorAll('.link-visibility-item');
       accordion  = document.querySelectorAll('.color-accordion');
      console.log(toggle,modeSwitch);
    toggle.addEventListener("click", () =>{
        sidebar.classList.toggle("close");
          for (let i = 0; i < link.length; i++) {
                link[i].classList.toggle('d-none') ;
          }
    });
    searchBtn.addEventListener("click", () =>{
        sidebar.classList.remove("close");
    });

      modeSwitch.addEventListener("click", () =>{
        body.classList.toggle("dark");
        for (let i = 0; i < accordion.length; i++) {
            accordion[i].classList.toggle('color-accordion-style');
      }
      for (let i = 0; i < link.length; i++) {
        link[i].classList.toggle('color-text-accordion') ;
  }
       


        if(body.classList.contains("dark")){
            modeText.innerText = "Light Mode"
        }else{
            modeText.innerText = "Dark Mode"
          }
      });