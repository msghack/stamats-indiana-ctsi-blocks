(()=>{"use strict";var e,n={49:()=>{const e=window.wp.blocks,n=window.React,r=window.wp.blockEditor,t=window.wp.data,o=JSON.parse('{"UU":"custom/container"}');(0,e.registerBlockType)(o.UU,{edit:function(e){const o=wp.blocks.getBlockTypes().map((e=>e.name)).filter((e=>"custom/container"!==e&&!e.startsWith("acf/"))),c=(0,r.useBlockProps)({className:"container",style:{border:"2px solid #ddd",padding:"20px"}}),{hasInnerBlocks:s}=(0,t.useSelect)((n=>{const{getBlock:r,getBlockParents:t}=n("core/block-editor"),o=r(e.clientId),c=t(e.clientId);return{hasInnerBlocks:o&&o.innerBlocks.length>0,isSelectedParent:c.length>0}}));return(0,n.createElement)("div",{...c},(0,n.createElement)(r.InnerBlocks,{allowedBlocks:o,renderAppender:s?void 0:r.InnerBlocks.ButtonBlockAppender}))},save:function(){const e=r.useBlockProps.save({className:"container"});return(0,n.createElement)("div",{...e},(0,n.createElement)(r.InnerBlocks.Content,null))}})}},r={};function t(e){var o=r[e];if(void 0!==o)return o.exports;var c=r[e]={exports:{}};return n[e](c,c.exports,t),c.exports}t.m=n,e=[],t.O=(n,r,o,c)=>{if(!r){var s=1/0;for(d=0;d<e.length;d++){for(var[r,o,c]=e[d],l=!0,a=0;a<r.length;a++)(!1&c||s>=c)&&Object.keys(t.O).every((e=>t.O[e](r[a])))?r.splice(a--,1):(l=!1,c<s&&(s=c));if(l){e.splice(d--,1);var i=o();void 0!==i&&(n=i)}}return n}c=c||0;for(var d=e.length;d>0&&e[d-1][2]>c;d--)e[d]=e[d-1];e[d]=[r,o,c]},t.o=(e,n)=>Object.prototype.hasOwnProperty.call(e,n),(()=>{var e={57:0,350:0};t.O.j=n=>0===e[n];var n=(n,r)=>{var o,c,[s,l,a]=r,i=0;if(s.some((n=>0!==e[n]))){for(o in l)t.o(l,o)&&(t.m[o]=l[o]);if(a)var d=a(t)}for(n&&n(r);i<s.length;i++)c=s[i],t.o(e,c)&&e[c]&&e[c][0](),e[c]=0;return t.O(d)},r=globalThis.webpackChunkindiana_ctsi_blocks=globalThis.webpackChunkindiana_ctsi_blocks||[];r.forEach(n.bind(null,0)),r.push=n.bind(null,r.push.bind(r))})();var o=t.O(void 0,[350],(()=>t(49)));o=t.O(o)})();