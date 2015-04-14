.. _dojo/partial:

============
dojo.partial
============



Have you ever wanted to control arguments being passed into a function?  For example, have you ever had the need to set the first parameter of a function to a defined value and allow the others to still vary?  Well, dojo provides a way to do that!  Partial is a cousin to 'hitch' in that it's a function that returns a function.  What it does is allow you to fix the first N parameters of a function call to some specific value.  This can be very powerful, especially when you want to pass in object references or the like into notification functions of DataStores.

Let's take a quick look at a pseudo-code example of using partial:

[ Dojo 1.7 AMD ]

.. js ::

  require(["dojo/_base/lang", "dojo/_base/xhr"], function(lang, xhr){
    var dataLoaded = function(someFirstParam, data, ioargs){};

    var args = {
      url: "foo",
      load: dataLoaded
    };
    xhr.get(args);
  });


[ Dojo < 1.7 ]

.. js ::

  var dataLoaded = function(someFirstParam, data, ioargs){};

  var args = {
    url: "foo",
    load: dataLoaded
  };
  dojo.xhrGet(args);

Okay, so that will invoke the dataLoaded function when the xhrGet function returns ... but load of xhrGet expects param structure of:
load(data, ioargs).  So how the heck do we make sure that xhrGet's expectations are honored even with that new first param called 'someFirstParam'?  Enter dojo.partial!  Here's how you would do it:

[ Dojo 1.7 AMD ]

.. js ::

  require(["dojo/_base/lang", "dojo/_base/xhr"], function(lang, xhr){
    var dataLoaded = function(someFirstParam, data, ioargs){};

    var args = {
      url: "foo",
      load: lang.partial(dataLoaded, "firstValue");
    };
    xhr.get(args);
  });


[ Dojo < 1.7 ]

.. js ::

  var dataLoaded = function(someFirstParam, data, ioargs){};

  var args = {
    url: "foo",
    load: dojo.partial(dataLoaded, "firstValue");
  }
  dojo.xhrGet(args);

What that does is create a new function that wraps dataLoaded and affixes the first parameter with the value "firstValue".  Note that dojo.partial allows you to do N parameters, so you can keep defining as many values as you want for fixed-value parameters of a function.

Basic Example
-------------

.. code-example ::

  Let's look at a quick running example:

  .. js ::

      dojo.require("dijit.form.Button");

      dojo.ready(function(){
        var myClick = function(presetValue, event){
           var node = dojo.byId("appendLocation");
           node.appendChild(document.createTextNode(presetValue));
           node.appendChild(document.createElement("br"));
        }
        dojo.connect(dijit.byId("myButton"), "onClick", dojo.partial(myClick , "This is preset text!"));
      });

  .. html ::
    
    <button data-dojo-type="dijit.form.Button" id="myButton">Click me to append in a preset value!</button>
    <div id="appendLocation"></div>

.. api-inline :: dojo.partial
