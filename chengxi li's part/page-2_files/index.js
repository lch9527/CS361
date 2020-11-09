/*
 * Write your JS code in this file.  Don't forget to include your name and
 * @oregonstate.edu email address below.
 *
 * Name:
 * Email:
 */
var posts = [];
var current_post = document.getElementById("posts").firstElementChild;
var size = document.getElementById("posts").childElementCount;
posts.push(current_post)
for (var i = 1; i < size; i++) {
    posts.push(current_post.nextElementSibling);
    current_post = current_post.nextElementSibling;
}
document.getElementById("filter-update-button").addEventListener("click", update);
document.getElementById("sell-something-button").addEventListener("click", modal_Popup);
document.getElementById("modal-close").addEventListener("click", modal_Close);
document.getElementById("modal-cancel").addEventListener("click", modal_Close);
document.getElementById("modal-accept").addEventListener("click", modal_accept);
function modal_Popup() {
    document.getElementById("post-text-input").value = "";
    document.getElementById("post-photo-input").value = "";
    document.getElementById("post-price-input").value = "100";
    document.getElementById("post-city-input").value = "";
    document.getElementById("post-condition-good").checked = true;
    document.getElementById("modal-backdrop").classList.toggle('hidden');
    document.getElementById("sell-something-modal").classList.toggle('hidden');
}
function modal_Close() {
    document.getElementById("post-text-input").value = "";
    document.getElementById("post-photo-input").value = "";
    document.getElementById("post-price-input").value = "";
    document.getElementById("post-city-input").value = "";
    document.getElementById("post-condition-new").checked = true;
    document.getElementById("modal-backdrop").classList.toggle('hidden');
    document.getElementById("sell-something-modal").classList.toggle('hidden');
}
function modal_accept() {
    if (!modal_check_inputs()) {
        window.alert("There is still empty items needed to be input");
        return;
    }
    var last_post = document.getElementById("posts").lastElementChild;
    var clone = last_post.cloneNode(true);
    var condition = "";
    if (document.getElementById("post-condition-new").checked) { condition = "new"; }
    else if (document.getElementById("post-condition-excellent").checked) { condition = "excellent"; }
    else if (document.getElementById("post-condition-good").checked) { condition = "good"; }
    else if (document.getElementById("post-condition-fair").checked) { condition = "fair"; }
    else if (document.getElementById("post-condition-poor").checked) { condition = "poor"; }
    clone.setAttribute("data-price", document.getElementById("post-price-input").value);
    clone.setAttribute("data-city", document.getElementById("post-city-input").value);
    clone.setAttribute("data-condition", condition);
    clone.firstElementChild.firstElementChild.firstElementChild.setAttribute("src", document.getElementById("post-photo-input").value);
    clone.firstElementChild.firstElementChild.firstElementChild.removeAttribute("alt");
    clone.firstElementChild.lastElementChild.firstElementChild.textContent = document.getElementById("post-text-input").value;
    clone.firstElementChild.lastElementChild.firstElementChild.nextElementSibling.textContent = "$" + document.getElementById("post-price-input").value;
    clone.firstElementChild.lastElementChild.lastElementChild.textContent = "(" + document.getElementById("post-city-input").value + ")";
    var list = document.getElementById("filter-city");
    var cities = list.childElementCount - 1;
    var city_entered = document.getElementById("post-city-input").value
    var exists = false;
    for (var i = 1; i < cities; i++) {
        var node_text = document.getElementById("filter-city").children[i].text.toLowerCase();;
        var city_entered_lowc = city_entered.toLowerCase();
        if (node_text == city_entered_lowc) {
            exists = true;
            break;
        }
    }
    if (!exists) {
        var elem = document.createElement("option");
        var city = city_entered[0].toUpperCase();
        for(var i = 1; i < city_entered.length; i++) {
            city += city_entered[i].toLowerCase();
        }
        elem.text = city;
        list.appendChild(elem);
    }
    posts.push(clone);
    document.getElementById("posts").appendChild(clone);
    modal_Close();
}
function modal_check_inputs() {
    if (document.getElementById("post-text-input").value == ""
        || document.getElementById("post-photo-input").value == ""
        || document.getElementById("post-price-input").value == ""
        || document.getElementById("post-city-input").value == "") {
            return false;
        }
    return true;
}
function update() {
    var text = document.getElementById("filter-text").value.toLowerCase();
    var price_min = document.getElementById("filter-min-price").value;
    var price_max = document.getElementById("filter-max-price").value;
    var city = "";
    var conditions = [];
    var city_list = document.getElementById("filter-city");
    var list_size = city_list.childElementCount;
    var posts_elem = document.getElementById("posts");
    var size = posts_elem.children.length;
    for (var i = 0; i < size; i++) {
        posts_elem.removeChild(posts_elem.firstElementChild);
    }
    for (var i = 0; i < list_size; i++) {
        if (city_list.children[i].selected) {
            city = city_list.children[i].text.toLowerCase();
            break;
        }
    }
    var condition_list = document.getElementById("filter-condition");
    var contains = false;
    for (var i = 1; i < 6; i++) {
        if (condition_list.children[i].firstElementChild.checked) {
            conditions.push(condition_list.children[i].lastElementChild.textContent.toLowerCase());
        }
    }
    for (var i = 0; i < posts.length; i++) {
        var elem = posts[i];
        var pass = false;
        var condition_pass = false;
        var elem_title = elem.firstElementChild.lastElementChild.firstElementChild.text.toLowerCase();
        var elem_price = elem.getAttribute("data-price");
        var elem_city = elem.getAttribute("data-city").toLowerCase();
        var elem_condition = elem.getAttribute("data-condition");
        if (elem_title.search(text) != -1) {
            if (elem_city == city || city == "" || city == "any") {
                for (var j = 0; j < conditions.length; j++) {
                    if (elem_condition == conditions[j]) {
                        condition_pass = true;
                        break;
                    }
                }
                if (condition_pass || conditions.length == 0) {
                    switch (price_min) {
                        case "":
                            if (price_min == "" && price_max == "") { pass = true; }
                            if (price_min == "" && price_max != "" && parseInt(elem_price) <= parseInt(price_max)) { pass = true; }
                        default:
                            if (price_min != "" && price_max == "" && parseInt(elem_price) >= parseInt(price_min)) { pass = true; }
                            if (price_min != "" && price_max != "" && parseInt(price_min) <= parseInt(price_max) && parseInt(elem_price) >= parseInt(price_min) && parseInt(elem_price) <= parseInt(price_max)) { pass = true; }
                    }
                }
            }
        }
        if (pass) {
            posts_elem.appendChild(elem);
        }
    }
}
