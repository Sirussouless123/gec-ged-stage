function inittab(tabWrapper, activeTab = 1) {
  const tabBtns = tabWrapper.querySelectorAll(".tab-btn");
  const underline = tabWrapper.querySelector(".underline");
  const tabContents = tabWrapper.querySelectorAll(".tab-content");

  activeTab = activeTab - 1;
  tabBtns[activeTab].classList.add("active");
  underline.style.width = `${tabBtns[activeTab].offsetWidth}px`;
  underline.style.left = `${tabBtns[activeTab].offsetLeft}px`;
  tabContents.forEach((content) => {
    content.style.transform = `translateX(-${activeTab * 100}%)`;
  });

  tabBtns.forEach((btn, index) => {
    btn.addEventListener("click", () => {
      tabBtns.forEach((btn) => btn.classList.remove("active"));
      btn.classList.add("active");
      underline.style.width = `${btn.offsetWidth}px`;
      underline.style.left = `${btn.offsetLeft}px`;
      tabContents.forEach((content) => {
        content.style.transform = `translateX(-${index * 100}%)`;
      });
    });

    //same effect as on click when button in focus
    btn.addEventListener("focus", () => {
      tabBtns.forEach((btn) => btn.classList.remove("active"));
      btn.classList.add("active");
      underline.style.width = `${btn.offsetWidth}px`;
      underline.style.left = `${btn.offsetLeft}px`;
      tabContents.forEach((content) => {
        content.style.transform = `translateX(-${index * 100}%)`;
      });
    });
  });
}

const tabWrappers = document.querySelectorAll(".tab-wrapper");
tabWrappers.forEach((tabWrapper, index) => inittab(tabWrapper));
