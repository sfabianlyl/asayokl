function get_posts(hashtag){
    $.ajax({
        type:"GET",
        url:"/ig_get_posts",
        success:function(data){
            display_posts(hashtag,data.data);
        },
        error:function(data){
            console.log(data);
        }
    })
}

function display_posts(hashtag,posts){
    var ig=$("#instagramContainer");
    ig.html("");
    posts.filter(post=>post.caption.includes(hashtag)).forEach(post => {
        //post.media_url;
        //post.permalink;
        var container=$("<div></div>").addClass("instagram-img-container");
        var anchor=$("<a></a>").attr({
            href:post.permalink,
            target:"_blank"
        });
        var img=post.media_type=="VIDEO"?$("<video></video>").addClass("instagram-img").prop({
            autoplay:true,
            muted:true,
            playsinline:true,
            loop:true
        }).append($("<source>").attr({
            src:post.media_url,
            type:"video/mp4"
        })):$("<img>").addClass("instagram-img").attr({
            src:post.media_url
        });
        ig.append(container.append(anchor.append(img)));
    });
    $.each(ig.find("video"),function(index,video){
        video.load();
    });

}

$(document).ready(function(){
    var container=$("#instagramContainer");
    if(container.length!=0){
        container.append($("<div></div>").addClass("custom-loader"));
        get_posts(container.attr("hashtag"));
    }
});