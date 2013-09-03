contao-hierarchicalBodyClass
========================

The inserttag work recursive back to there parents or with an pageID

Currently this inserttag returns the first occurence of an css-class

This one is tested for Contao 3.1


Installation
------------

Add following inserttag to your body-class field in the site layout: {{hbc::default}}



How it works
------------

__The default inserttag is:__
{{hbc::default}}
this one is for the recursive usage


__The inserttag with page id:__
{{hbc::5}}
get the css class from an specific site or nothing



Thanks to
------------

The source is inspired of the header_code extension from Leo Unglaub