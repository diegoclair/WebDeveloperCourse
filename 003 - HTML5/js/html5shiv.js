/**
* @preserve HTML5 Shiv 3.7.3 | @afarkas @jdalton @jon_neal @rem | MIT / GPL2 Licenciado
*/
! function (a, b) {function c (a, b) {var c = a.createElement ("p"), d = a.getElementsByTagName ("head") [0] || a.documentElement; return c. innerHTML = "x <style>" + b + "</ style>", d.insertBefore (c.lastChild, d.firstChild)} função d () {var a = t.elements; return "string" == typeof a ? a.split (""): a} função e (a, b) {var c = t.elements; "string"! = typeof c && (c = c.join ("")), "string"! = tipoof a && (a = a.join ("")), t.elements = c + "" + a, j (b)} função f (a) {var b = s [a [q]]; retorno b || (b = {}, r ++, a [q] = r, s [r] = b), b} função g (a, c, d) {if (c || (c = b), l) return c .createElement (a); d || (d = f (c)); var e; return e = d.cache [a]? d.cache [a] .cloneNode (): p.test (a)? ( d.cache [a] = d.createElem (a)). cloneNode (): d.createElem (a) ,! e.canHaveChildren || o.test (a) || e.tagUrn? e: d.frag.appendChild (e)} função h (a, c) {if (a || (a = b), l) retorna a.createDocumentFragment (); c = c || f (a); para (var e = c. () [i .cache || (b.cache = {}, b.createElem = a.createElement, b.createFrag = a.createDocumentFragment, b.frag = b.createFrag ()), a.createElement = function (c) {return t .shivMethods? g (c, a, b): b.createElem (c)}, a.createDocumentFragment = Função ("h, f", "função de retorno () {var n = f.cloneNode (), c = n .createElement; h.shivMethods && ("+ d (). join (). replace (/ [\ w \ -:] + / g, função (a) {return b.createElem (a), b.frag.createElement ( a), 'c ("' + a + '")'}) + "); return n}") (t, b.frag)} função j (a) {a || (a = b); var d = f (a); return! t.shivCSS || k || d.hasCSS || (d.hasCSS = !! c (a, "artigo, lado a lado, diálogo, figuração, figura, rodapé, cabeçalho, hgroup, principal nav,seção {exibição: bloco} marca {fundo: # FF0; cor: # 000} modelo {exibição: nenhum} ")), l || i (a, d), a} var k, l, m =" 3.7. 3 ", n = a.html5 || {}, o = / ^ <| ^ (?: botão | mapa | selecione | textarea | objeto | iframe | opção | optgroup) $ / i, p = / ^ (?: um | b | código | div | fieldset | h1 | h2 | h3 | h4 | h5 | h6 | i | label | li | ol | p | q | span | strong | style | table | tbody | td | th | tr | ul) $ / i, q = "_ html5shiv", r = 0, s = {} ;! função () {try {var a = b.createElement ("a"); a.innerHTML = "<xyz> </ xyz> ", k =" hidden "em a, l = 1 == a.childNodes.length || function () {b.createElement (" a "); var a = b.createDocumentFragment (); return" undefined " == typeof a.cloneNode || "indefinido" == typeof a.createDocumentFragment || "indefinido" == typeof a.createElement} ()} catch (c) {k =! 0, l =! 0}} () ; var t = {elements: n.elements || "abbr artigo de lado audio bdi lona dados datalista detalhes diálogo figcaption figura rodapé cabeçalho hgroup principal marca medidor nav saída imagem progresso seção sumário modelo tempo video ", versão: m, shivCSS: n.shivCSS! ==! 1, suporta Comentários: Desconhecidos: l, shivMethods: n.shivMethods! ==! 1, digite: "default", shivDocument: j, createElement: g, createDocumentFragment: h, addElements: e}; a.html5 = t, j (b), "objeto" == typeof module && module .exports && (module.exports = t)} (janela "indefinida"! = typeof window ?, this, document);j (b), "objeto" == typeof module && module.exports && (module.exports = t)} (janela "indefinida"! = tipoof janela ?, isso, documento);j (b), "objeto" == typeof module && module.exports && (module.exports = t)} (janela "indefinida"! = tipoof janela ?, isso, documento);