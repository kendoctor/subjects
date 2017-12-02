# How to use sublime text editor

## Prerequisistes


## Contents


### How to install


> Open sublime text in terminal 

```
# open file
subl filename

# open directory
subl directory

```

> Create a new file  `Ctrl + N`


> Close current tab or editing file `Ctrl + W`

> AdvancedNewFile Package

This package will help you create files more quickly.

* `Ctrl + Shift + P` open command palette, type `Install Package` and hit `Enter`
* Input `AdvancedNewFile` and enter, install the package.
* `Super + Alt + N` will pop up the input field at the bottom of editor
* Input filename or path/filename and hit `Enter`, it will help you directly create the file and also folders if not exist


> Open a file `Ctrl + O`

> Switch tabs between editing files `Ctrl + Tab`

> Create Snippets for quick coding.

Typing a short name and hit `Tab` key to get a block of codes, it will bootstrap your coding speed.

* Click menu `Tools > Developer > New snippet`, it creates a sample snippet for your editing.

```
<snippet>
    <content><![CDATA[
Hello, ${1:this} is a ${2:snippet}.
]]></content>
    <!-- Optional: Set a tabTrigger to define how to trigger the snippet -->
    <tabTrigger>hello</tabTrigger>
    <!-- Optional: Set a scope to limit where the snippet will trigger -->
    <scope>text.html.markdown</scope>
</snippet>

```

* tabTrigger - Typing `hello` and hit `Tab` will automatically finish the code block.
* scope - In .txt or .html or .markdown, this snippet will trigger, otherwise will not.
* ${1:this} - caret will stop at this position first with default content `this`
* ${2:snippet} - when complete the first position and hit `Tab` will jump to this position.

> SnippetMaker package

It's a more convenient tool for making snippets.

* `Ctrl + Shift + P` open command palette, type `Install package` and hit `Enter`
* Type `SnippetMaker` and hit `Enter`, install the package.
* Write codes which you want to be a snippet and select them all
* `Ctrl + Shift + P` open command palette, type `Make snippet` and hit `Enter`
* Type information in the text file at the bottom step by step
    1. tabTrigger name 
    2. description for the snippet
    3. scope 
    4. filename to save this snippet


> Try to make a new snippet for creating a php function

* `${0:}` will be the last stop of caret.
* This will only be triggered in php source, it means in `<?php` code block

```
<snippet>
<content><![CDATA[

function ${1:method}()
{
    ${0:}
}

]]></content>
<tabTrigger>func</tabTrigger>
<description>create a php function</description>
<scope>source.php</scope>
</snippet>

```

> Try to make a new snippet for creating a html tag

* mirrored fields - `${1:tag}` and `${1:}`

```
<snippet>
<content><![CDATA[
<${1:tag}>${0:}</${1:}>
]]></content>
<tabTrigger>tag</tabTrigger>
<description>create a block html tag</description>
<scope>text.html.markdown</scope>
</snippet>

```




