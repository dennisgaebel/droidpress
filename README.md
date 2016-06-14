DroidPress
===

A starter WordPress theme using [_s](http://underscores.me) as the foundation.

Getting Started
---------------

### Setup

For local development check the ``setup`` folder that includes various files such as JSON files related to specific plugins this project uses. The setup folder also contains the database in order to use the most recent development content and storage.

### Plugins

- Gravity Forms
- Advanced Custom Fields Pro

### Database Config

- wp-config prefix : ``[prefix]``

### Permalinks

- ``/%category%/%postname%/``
**custom structure**

### Workflow & Project Setup

You must have bower, node, npm and gulp installed globally to your system before executing any of the commands below.

- dependencies [bower, node, npm]
- tooling [Sequel Pro(DB), Vagrant(Server), Gulp(Task Mgr)]

**Install NPM Pkgs**

```shell
npm install
```

**Install Bower Pkgs**

```shell
bower install
```

**Compile Sass**

```shell
gulp
```

**Compressing Sass**

```shell
export NODE_ENV=development
export NODE_ENV=production
```
command-line Node env flag

Stop your shell, set the flag to your desired option above and rerun gulp to compile.

**SVG Sprites**

```shell
gulp svgsprite
```

**Image Minification and Compression (``.{jpg,jpeg,png,svg}``)**

```shell
gulp compressor
```
