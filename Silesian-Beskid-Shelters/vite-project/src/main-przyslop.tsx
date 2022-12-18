import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterDescription from './components/body/shelterDescription'


ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
    <Hero hero_image='src/assets/images/przyslopHero.jpg' header='Schronisko' sub_text='Przysłop'/>
    <ShelterDescription 
    shelter_image='src/assets/images/stozek.jpg' 
    image1='src/assets/images/przyslop1.jpg'
    image2='src/assets/images/przyslop2.jpg' 
    head1='Początek Schroniska' 
    head2='Aktualny budynek' 
    text1='Pierwszy budynek schroniska pochodził jeszcze z końca XIX wieku. Był to drewniany domek myśliwski arcyksięcia Fryderyka Habsburga, zbudowany w 1897 jako baza wypadowa do polowań na głuszce. Budynek został zdewastowany pod koniec I wojny światowej i początkowo pozostawał w dyspozycji Lasów Państwowych. Dopiero po kilku latach został przejęty przez Górnośląski Oddział Polskiego Towarzystwa Tatrzańskiego, który go wyremontował i 15 lipca 1925 oddał do użytku turystom. Aktualnie ten budynek wykorzystywanny jest jako siedziba oddziału PTTK w Wiśle'
    text2='W latach siedemdziesiątych XX wieku w związku z coraz większą ilością turystów postawiono nowy budynek, służący nam do dzisiaj. Schronisko jest na szlaku prowadzącym na Baranią Górę, przez co jest naturalnym miejscem na złapanie oddechu i chwilę odpoczynku.'
    secondText={true}
    />

    <Footer />
  </React.StrictMode>
)