# Dukt Videos to Text
ExpressionEngine 2 fieldtype that will convert all Dukt Video fields to text fields on install. Frontend tag only supports Vimeo by default.

It will also replace all Matrix columns which are Dukt Video fields, with text fields.

Please note; I'm not providing support for this addon, just putting it out here in case it can help others that are stuck on an EE upgrade because of Dukt Videos.

## How it works

Test this on your local developer instance, not on the live site. It might not work as expected.

1. Install the fieldtype and all existing Dukt Videos fields will be "Dukt Video to Text"-fields (basically text fields) which contain the video url's of the video selected.
2. Uninstall Dukt Videos

The frontend {video} tag will output a **vimeo** embed. My client just used Vimeo so I've only implemented that. So basically all I had to do to upgrade the sites where I used Dukt Video was install this plugin and everything would work automatically. If you need other embeds I guess you could make it work with [Antenna](https://devot-ee.com/add-ons/antenna) or something like that.
