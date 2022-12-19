import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import Hero from './components/Hero/hero'
import Footer from './components/Footer/footer'
import ShelterDescription from './components/body/shelterDescription'
import ResetScrollPosition from './components/body/resetScroll'



const MainSkrzyczne = () => {


  return (

    <div>
    <ResetScrollPosition />
    <Hero hero_image='assets/skrzyczneHero.jpg' header='Schronisko' sub_text='Skrzyczne'/>
    <ShelterDescription 
    shelter_image='assets/stozek.jpg' 
    image1='assets/skrzyczne1.jpg'
    image2='assets/skrzyczne2.jpg' 
    head1='Początek Schroniska' 
    head2='Odbudowa po wojnie' 
    text1='Około 1930 Rudolf Urbanke zakupił od mieszkańców Lipowej parcelę na szczytowej polanie Skrzycznego i wybudował na niej drewniane schronisko. Miało ono 30 miejsc noclegowych. Zimą było odwiedzane głównie przez bielskich Niemców, którzy jeździli tu na nartach. Piętrowy budynek nie pasował jednak swą architekturą do otoczenia. W połowie lat 30. XX wieku obiekt spłonął. Po pożarze właściciel przystąpił do budowy nowego, większego schroniska.
    W czasie II wojny światowej schronisko zostało zajęte przez wojska niemieckie. Właściciel, będący Niemcem, mógł jednak nadal prowadzić działalność, z czego korzystało wielu narciarzy aż do 1944. Kiedy Urbanke został powołany do armii niemieckiej, obiekt prowadziła jego żona. W zimie 1945 przez kilka tygodni znajdował się on praktycznie na linii frontu.'
    text2='Budynek przetrwał wojnę, ale został w poważnym stopniu zniszczony, a jego wyposażenie rozkradzione. W 1946 schronisko jako mienie poniemieckie przejął bielski oddział Polskiego Towarzystwa Tatrzańskiego, jednak obciążony kosztami odbudowy wielu innych schronisk nie dysponował on funduszami potrzebnymi do jego remontu. Budynek stał opuszczony i zagrożony zupełnym zniszczeniem. Dopiero w 1947 obiekt został przejęty przez Oddział Górnośląski PTT, który przeprowadził pierwszy, niezbędny remont. W schronisku powstał bufet turystyczny, jadalnia oraz sala noclegowa. Po remoncie schronisko uroczyście otwarto w czerwcu 1950. Od końca 1950 schronisko znajduje się w gestii Polskiego Towarzystwa Turystyczno-Krajoznawczego.'
    secondText={true}
    />
    <Footer />
    </div>
)};
export default MainSkrzyczne