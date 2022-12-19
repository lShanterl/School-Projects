import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterDescription from './components/body/shelterDescription'
import ResetScrollPosition from './components/body/resetScroll'



const MainStozek = () => {

  return (
    <div>
    <ResetScrollPosition />
    <Hero hero_image='assets/stozekHero.jpg' header='Schronisko' sub_text='Stożek'/>
    <ShelterDescription 
    shelter_image='assets/stozek.jpg' 
    image1='assets/stozek1.jpg'
    image2='assets/klimczok2.jpg' 
    head1='1 Polskie Schronisko Górskie w Beskidzie' 
    head2='Wnętrze Schroniska' 
    text1='Było to pierwsze polskie schronisko w Beskidzie Śląskim. O jego budowie zadecydowali w 1919 r. członkowie zarządu cieszyńskiego oddziału Polskiego Towarzystwa Tatrzańskiego. Budowę rozpoczęto w maju 1920 r. według projektu Stanisława Chorubskiego, który wykorzystał elementy architektoniczne zarówno miejscowe, jak i podhalańskie.'
    text2='W schronisku znajduje się restauracja z dużym wyborem dań śniadaniowych, obiadowych i barowych oraz niewielki sklepik ze słodyczami i pamiątkami. W przeszklonej jadalni pomieścić się może ponad 100 osób. Latem działa także ogródek z parasolami. W schronisku dostępna jest telewizja, stół do ping-ponga oraz sauna. Można wypożyczyć gry planszowe i zręcznościowe. Po uprzednim uzgodnieniu możliwe jest palenie ogniska czy urządzenie dyskoteki.'
    secondText={true}
    />

    <Footer />
  </div>
)};
export default MainStozek;