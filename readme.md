# link-by-slug

This is a WordPress plugin creates shortcode which returns link from slug.

## installation

Put all files into `wp-content/plugin/link-by-slug`.

## usage
```
[linkbyslug postid="" slug="" class="" anchor=""]
```

`postid` or `slug' is required. If both is given, `postid` will be used to pick a post.

Strings given to `class` will add class attribute for output html;

## sample

```
[linkbyslug postid="23" class="some-class"]
//result
<a href="url-to-post-23" class="some-class">title of post 23</a>;

[linkbyslug slug="some-slug-of-a-post" class="other-class"]
//result
<a href="url-to-the-post" class="some-class">title of the post</a>;
```
