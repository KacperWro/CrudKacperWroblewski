function validateCategoryForm()
{
    let categoryName = document.forms["categoryForm"]["name"].value;
    let regex = new RegExp('[A-Za-z0-9 ]{3,30}');
    
    if ((categoryName.length < 3 || categoryName.length > 30) || !regex.test(categoryName))
    {
        document.getElementById("categoryNameError").innerHTML = "Category name must be alphanumeric and between 3 and 30 characters in length"
        document.getElementById("categoryNameError").style.color = "red";

        return false;
    }
    else
    {
        document.getElementById("categoryNameError").innerHTML = "Category Name OK"
        document.getElementById("categoryNameError").style.color = "rgb(8, 194, 39)";

        return true;
    }
}

function validateForumPostForm()
{
    let postTitle = document.forms["postForm"]["title"].value;
    let postContent = document.forms["postForm"]["content"].value;
    let regex = new RegExp("[A-Za-z0-9, ]");

    let validTitle = false;
    let validContent = false;

    if ((postTitle.length < 3 || postTitle.length > 30) || !regex.test(postTitle))
    {
        document.getElementById("postTitleError").innerHTML = "Title must be alphanumeric and between 3 and 30 characters in length"
        document.getElementById("postTitleError").style.color = "red";
    }
    else
    {
        document.getElementById("postTitleError").innerHTML = "Title OK"
        document.getElementById("postTitleError").style.color = "rgb(8, 194, 39)";
        validTitle = true;
    }

    if (postContent.length < 20 || postContent.length > 800)
    {
        document.getElementById("postContentError").innerHTML = "Post must be between 20 and 800 characters in length"
        document.getElementById("postContentError").style.color = "red";
    }
    else
    {
        document.getElementById("postContentError").innerHTML = "Post OK"
        document.getElementById("postContentError").style.color = "rgb(8, 194, 39)";
        validContent = true;
    }

    return validTitle && validContent;
}

function validateReplyForm()
{
    let replyContent = document.forms["replyForm"]["content"].value;

    if (replyContent.length < 20 || replyContent.length > 800)
    {
        document.getElementById("replyContentError").innerHTML = "Reply must be between 20 and 800 characters in length"
        document.getElementById("replyContentError").style.color = "red";

        return false;
    }
    else
    {
        document.getElementById("replyContentError").innerHTML = "Reply OK"
        document.getElementById("replyContentError").style.color = "rgb(8, 194, 39)";

        return true;
    }
}

function validateUserForm()
{
    let userName = document.forms["userForm"]["name"].value;
    let regex = new RegExp('[A-Za-z0-9]{3,20}');
    
    if ((userName.length < 3 || userName.length > 30) || !regex.test(userName))
    {
        document.getElementById("userNameError").innerHTML = "Username must be alphanumeric, without spaces, and 3-20 characters in length"
        document.getElementById("userNameError").style.color = "red";

        return false;
    }
    else
    {
        document.getElementById("userNameError").innerHTML = "Username OK"
        document.getElementById("userNameError").style.color = "rgb(8, 194, 39)";

        return true;
    }
}