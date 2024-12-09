const sidebarIcon = document.getElementById('sidebarIcon');
const sidebar = document.getElementById('sidebar');
const header =document.getElementById('header');
//  side bar
sidebarIcon.addEventListener('click', () => {
   sidebar.classList.toggle('hidden');
});

// 
function toggleAddClientModal() {
   const modal = document.getElementById('AddClientModal');
   modal.classList.toggle('hidden');
}
const addclientmdl = document.getElementById('AddClientModal')
const closeAddClient = document.querySelectorAll('.closeAddClient');
closeAddClient.forEach(button => {
   button.addEventListener('click', () => {
      addclientmdl.classList.add('hidden');

   });
})
function toggleAddVoitModal(){
   const AddVoitModal=document.getElementById('AddVoitModal')
   AddVoitModal.classList.toggle('hidden')
}
const AddVoitModal= document.getElementById('AddVoitModal');
const closeAddVoit = document.querySelectorAll('.closeAddVoit');
closeAddVoit.forEach(button => {
   button.addEventListener('click', () => {
      AddVoitModal.classList.add('hidden');

   });
})
function toggleADDContratModal(){
   const addContractModal=document.getElementById('addContractModal')
   addContractModal.classList.toggle('hidden')
}
const closeContractModal = document.querySelectorAll('.closeContractModal');
const addContractmdl= document.getElementById('addContractModal');
closeContractModal.forEach(button => {
   button.addEventListener('click', () => {
      addContractmdl.classList.add('hidden');

   });
})
