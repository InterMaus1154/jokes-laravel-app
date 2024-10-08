/*joke tag preview*/
document.addEventListener("DOMContentLoaded", () => {

    //get dom elements
    const tagNameInput = document.querySelector("#tag_name");
    const tagColorInput = document.querySelector("#tag_color");
    const previewElement = document.querySelector(".tag-preview .joke-tag");

    //add event listener on every keystroke
    tagNameInput.addEventListener("input", e => {
        previewElement.innerText = e.target.value;
    });

    //on change of color input
    tagColorInput.addEventListener("input", e => {
        previewElement.style.setProperty('--tag-bg', e.target.value);
    });
});
