
function Addbid() {
    var price_bid=document.getElementById('price_bid').value;

    var loc_bid=document.getElementById('loc_bid').value;
    var img_obj=document.getElementById('bid_img');
    var p_image = document.getElementById('bid_img').value;
    var getFileExt = p_image.substring(p_image.lastIndexOf('.') + 1).toLowerCase()
    var allowedExtensions = ".png, .gif, .jpeg, .jpg";
    var pos = allowedExtensions.indexOf(getFileExt);
    if(!p_image){
        document.getElementById('bimg_error').innerHTML="Product Image is missing!!!";
        return false;
    }else if(pos<0){
        document.getElementById('img_error').innerHTML="Please upload file having extensions .jpeg/.jpg/.png/.gif only.!!!";
        return false;

    }
    else if(price_bid=="")
    {
        document.getElementById('bidprice_error').innerHTML="Price Is Missing!!!";
        return false;
    }

    else if(loc_bid=="")
    {
        document.getElementById('location_bid_error').innerHTML="Address Of Your Home!!!";
        return false;
    }

}
bid_img.addEventListener('change',function () {
    document.getElementById('bimg_error').innerHTML="";
})

price_bid.addEventListener('keypress',function () {
    document.getElementById('bidprice_error').innerHTML="";
})
loc_bid.addEventListener('keypress',function () {
    document.getElementById('location_bid_error').innerHTML="";
})