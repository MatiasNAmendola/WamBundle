# WamBundle

## A Warren's Abstract Machine on PHP
by Stefan Buettcher (original java version)
and Florent Genette (ported to PHP)

## What ?
A Warren Abstract Machine (WAM) is a virtual machine for Prolog (like a JVM for Java).
Today, this thing would be called a "PVM" (Prolog Virtual Machine) but at
the Old Ages, when one programmer can change the face of the (computer) world,
it was named by its maker.


David Warren wrote in "WAM - A tutorial reconstruction" :
<blockquote><p>The WAM is an abstract machine consisting of a memory architecture and instruction
set tailored to Prolog. It can be realised efficiently on a wide range of
hardware, and serves as a target for portable Prolog compilers. It has now become
accepted as a standard basis for implementing Prolog.</p></blockquote>

Wikipedia says :
<blockquote><p>Prolog has its roots in first-order logic, a formal logic, and unlike many
other programming languages, Prolog is declarative: the program logic is
expressed in terms of relations, represented as facts and rules. A computation
is initiated by running a query over these relations.</p></blockquote>

As you can see, Prolog has nearly no instructions nor loops nor ifs nor gotos.
The only thing you have to do is to enounce absolute truths.
At that point, Mr Spock says : "Fascinating"

Stop the chatty chat, I recommand wikipedia and the excellent book by
Hassan Aït-Kaci in the doc directory.

## Is it usefull ?
Like any other SDL, Prolog has a very limited scope but sometimes it can simplify some problem like :

 * You need a rule engine
 * You want to avoid big boring sequences of if-else-switch to implement some business intelligence
 * You need a big bunch of Chain of Responsability which changes every week
 * You face a logic problem with non deterministic path

## Can I haZ example ?
Look at the file basket.pro : it's a set of marketing rules for gift and discount
based on the content of a cart.

## Why port a nearly-forty-year language in PHP ?
### (from a ten-year release in Java  ?)
Well, first thing it is a matter of taste. Even with 3 hundreds years, JS Bach
is still the best musician in the Multiverse. Second, I am not saying Prolog
can solve anything, no. I think there is one language one can use for one
specific coding problem.

I also think, like any other language, we, programmers, have some responsability
to keep this knowledge alive, and the best way is to port this WAM to PHP, now.
It's not nostalgia, it's just recollection about these pioneers of computer 
progamming like Von Neumann or Turing.

## Some notes about this translation
I went through a lot a trouble thanks the "soft-typing" of PHP and the damned
"===" but even if I still prefer Java and strong typing, the managing of
strings and arrays in PHP is awsum. There's probably much optimizations to do
since the design was not thought for PHP. The good thing is my knowledge of PHP
internals has improved.

## TODO
 * see how to capture output and input in service
 * refactor and optimize with switch, preg_match...
 * namespacing and tree of bundle for symfony2
