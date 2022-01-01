import param from '@/param/param'

export default{
    getLocal(){
        return JSON.parse(localStorage.getItem(param.MembreConnecte));
    },

    setLocal(value){
        localStorage.setItem(param.MembreConnecte, JSON.stringify(value));
    },
    removeLocal(){
        localStorage.removeItem(param.MembreConnecte);
    }
}