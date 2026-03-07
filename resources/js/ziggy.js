const Ziggy = {"url":"http:\/\/mercadopago-react.test","port":null,"defaults":{},"routes":{"index":{"uri":"\/","methods":["GET","HEAD"]},"mercadopago":{"uri":"mercadopago\/{id}","methods":["POST"],"parameters":["id"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]},"storage.local.upload":{"uri":"storage\/{path}","methods":["PUT"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
