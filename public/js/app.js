function toggleLike(button) {
    const likeText = button.querySelector(".heart");
    const likesCount = button.nextElementSibling;
    let count = parseInt(likesCount.textContent.split(" ")[0]);

    if (button.classList.contains("liked")) {
        button.classList.remove("liked");
        likeText.style.color = "red";
        button.innerHTML = `<span class="heart">&#9829;</span> Like`;
        likesCount.textContent = `${count - 1} likes`;
    } else {
        button.classList.add("liked");
        likeText.style.color = "red";
        button.innerHTML = `<span class="heart">&#9829;</span> Liked`;
        likesCount.textContent = `${count + 1} likes`;
    }
}