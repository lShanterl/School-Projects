import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterDescription from './components/body/shelterDescription'
import { useEffect } from 'react';
import ResetScrollPosition from './components/body/resetScroll'

const MainBlatnia = () => {


  return (
    <div>
    <ResetScrollPosition />
      <Hero hero_image='assets/blatniaHero.jpg' header='Schronisko' sub_text='Błatnia'/>
    <ShelterDescription 
    shelter_image='src/assets/images/stozek.jpg' 
    image1='assets/blatnia1.jpg'
    image2='assets/blatnia2.jpg' 
    head1='Powstanie Schroniska' 
    head2='Rozbudowa' 
    text1='Powstanie Schroniska na Błatniej datuje się na rok 1926, gdy niemieckie Towarzystwo Przyjaciół Przyrody "Naturfreunde" z Aleksandrowic wybudowało w tym miejscu drewniane schronisko, które w szybkim czasie zyskało sporą popularność i stało się najczęściej odwiedzanym schroniskiem w okolicy. Tereny te wzbudziły zainteresowanie Polaków, gdyż przebiegały tędy szlaki na Klimczok i Szyndzielnię. W 1930 roku Bielskie Koło Polskiego Towarzystwa Tatrzańskiego chcąc wybudować konkurencyjne schronisko, zakupiło parcelę w pobliżu szczytu. Ze względu na kłopoty finansowe organizacji oraz zaangażowanie się w budowę obiektu w Zwardoniu sprawiły, że przedsięwzięcia nigdy nie zrealizowano.'
    text2='W latach 1959-1962 trwał proces rozbudowy schroniska, już pod opieką cieszyńskiego oddziału PTTK. Kolejny duży remont miał miejsce w latach 1965-1968, gdy powstała obecna jadalnia, zmodernizowano kuchnię i sanitariaty, doprowadzono energię elektryczną oraz zainstalowano centralne ogrzewanie. Obiekt przykryto wówczas także nowym dachem.'
    secondText={true}
    />

    <Footer />
    </div>
  )};
export default MainBlatnia;