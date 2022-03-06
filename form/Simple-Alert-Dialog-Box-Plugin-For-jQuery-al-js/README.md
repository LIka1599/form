##What is this?
al is a simple jQuery plugin that acts as an alerting system for your application. Rely on al to populate, show/hide, and facilitate everything involved with alerting your users.

##How do I use this?

####Include jQuery
Since this plugin is dependent on jQuery, you'll need that in your project first. You can download from [jQuery](http://jquery.com).

Include in your page:

```
<script src="jquery.js"></script>
```

####Download library files
Next, download al.js and al.css into your project, and including them in your page like this:

```
<link rel="stylesheet" href="al.css" />
<script src="al.js"></script>
```

*It's important to note that you need to include jQuery first, without it the plugin initialization will fail.*

####HTML Structure
In order to show the alert box, you'll need to place the HTML structure on the page somewhere. That structure looks like this:

```
<div id="alBox"></div>
```

*It doesn't really matter where you place it in your page because it will be hidden on page load as long as al.css is loaded too.*

####Pop up an alert
At this point, you're ready to pop an alert up. Just make sure you call the alert **after** the al.js plugin is loaded into the page. A call looks like this:

```
$("#alBox").al({
    context: "success",
    text: {
        title: "Success!",
        description: "This is an example of an alert"
    },
    seconds: 10
});
```
*All of the options are technically optional, but will give you a customized alert.*

##Options
Here are the current options you can pass the plugin:

| Option | Type | Description |
| ------ | ----- | -----------|
| context | string | default, success, warning, error |
| text.title | string | The title bar of your alert |
| text.description | string | The more verbose description of the alert. |
| text.dismiss | string | The text of the "dismiss" button |
| seconds | float | The number of seconds your alert will appear. Can also define as "infinite" to stay on screen until dismissal. |
| classes.container | string | Classes to be added to #alBox |
| classes.panel | string | Classes to be added to #alBox-panel |
| classes.title | string | Classes to be added to #alBox-title |
| classes.description | string | Classes to be added to #alBox-description |
| classes.hr | string | Classes to be added to the hr element above the dismiss button |
| classes.dismiss | string | Classes to be added to the dismiss button |
| redirect |  string | URL Location to redirect after the alert is done |

##What else?
If you want to contribute, please fork the project and submit pull requests.
