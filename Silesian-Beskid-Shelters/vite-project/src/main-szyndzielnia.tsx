import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterDescription from './components/body/shelterDescription'


ReactDOM.createRoot(document.getElementById('root') as HTMLElement).render(
  <React.StrictMode>
    <Hero hero_image='src/assets/images/szyndzielniaHero.jpg' header='Schronisko' sub_text='Szyndzielnia'/>
    <ShelterDescription 
    shelter_image='src/assets/images/stozek.jpg' 
    image1='src/assets/images/szyndzielnia1.jpg'
    image2='src/assets/images/skrzyczne2.jpg' 
    head1='Najstarsze schronisko w Beskidach' 
    head2='Najpopularniejsze schronisko w Beskidach' 
    text1='Budowę murowano-drewnianego schroniska na wzór alpejski zainicjowała sekcja niemieckiej organizacji turystyki górskiej, Beskidenverein. Budowa miała miejsce w latach 1896-1897. Zajęła się tym firma żydowskiego architekta, Karla Korna z Bielska. Na wzór alpejski budynek posiada charakterystyczną wieżyczkę.
    Dnia 18 lipca 1897 roku uroczyście otwarto Schronisko PTTK Szyndzielnia.'
    text2='Schronisko na Szyndzielni jest jednym z najpopularniejszych schronisk w Beskidach Śląskich. Ogromny wpływ ma na to uruchomiona w 1953 roku kolejka gondolowa, która po modernizacji w latach 1994- 1995 jest komfortową i jedną z najnowocześniejszych kolei gondolowych w Polsce.'
    secondText={true}
    />

    <Footer />
  </React.StrictMode>
)