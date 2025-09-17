﻿## GridViewScroll - NEW
Freeze column and fixed header in Table or GridView

<img border="0" border="0" style="border:1px solid #EFEFEF;" src="https://github.com/twlikol/GridViewScroll/raw/master/gridviewscrollv2_git.gif">

### Features
* Default scrollbar of browser
* Freeze Header, Column, Footer (only last row)

### Getting Started
1. Download the [latest release](https://github.com/twlikol/GridViewScroll/archive/master.zip) from GitHub
2. Include the `gridviewscroll.js` in web page
```html
<script type="text/javascript" src="js/gridviewscroll.js"></script>
  ``` 
3. Initialize table with options, then call `enhance`
```html
<script type="text/javascript">
    window.onload = function () {
        var gridViewScroll = new GridViewScroll({
            elementID : "gvMain" // Target element id
        });
        gridViewScroll.enhance();
    }
</script>
```

### Options
```html
<script type="text/javascript">
    var gridViewScroll = new GridViewScroll({
        elementID : "", // String
        width : 700, // Integer or String(Percentage)
        height : 350, // Integer or String(Percentage)
        freezeColumn : false, // Boolean
        freezeFooter : false, // Boolean
        freezeColumnCssClass : "", // String
        freezeFooterCssClass : "", // String
        freezeHeaderRowCount : 1, // Integer
        freezeColumnCount : 1, // Integer
        onscroll: function (scrollTop, scrollLeft) // onscroll event callback
    });
</script>
```

### Properties
```html
<script type="text/javascript">
    var gridViewScroll = new GridViewScroll({
        elementID : "gvMain"
    });
    gridViewScroll.enhance();
    var scrollPosition = gridViewScroll.scrollPosition // get scroll position
    var scrollTop = scrollPosition.scrollTop;
    var scrollLeft = scrollPosition.scrollLeft;
  
    var scrollPosition = { scrollTop: 50, scrollLeft: 50};
    gridViewScroll.scrollPosition = scrollPosition; // set scroll position
</script>
```

### Methods
```html
<script type="text/javascript">
    var gridViewScroll = new GridViewScroll({
        elementID : "gvMain"
    });
    gridViewScroll.enhance(); // Apply the gridviewscroll features
    gridViewScroll.undo(); // Undo the DOM changes, And remove gridviewscroll features
</script>
```

### Events
```html
<script type="text/javascript">
    var gridViewScroll = new GridViewScroll({
        elementID : "gvMain",
        onscroll: function (scrollTop, scrollLeft) {
            console.log("scrollTop: " + scrollTop + ", scrollLeft: " + scrollLeft);
        }
    });
    gridViewScroll.enhance();
</script>
```

### Supported Browsers
* Internet Explorer 9+
* Google Chrome (61.0.3163.100)
* Mozilla FireFox (56.0.2)

### Technical Support
If you have any question with gridviewscroll welcome to [filing an issue](https://github.com/twlikol/GridViewScroll/issues/new) on GitHub, I will try my best to help.

Or you can send email to [twlikol@msn.com](mailto:twlikol@msn.com).

### Copyright and License
Copyright © Likol Lee. Licensed under the MIT license.

## GridViewScroll with jQuery (v0.9.6.8)
This version is no longer supported, you can find in link:
https://github.com/twlikol/GridViewScroll/tree/v0.9.6.8
