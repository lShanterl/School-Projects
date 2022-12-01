import React from 'react'
import ReactDOM from 'react-dom/client'
import { useRef, useEffect } from 'react'
import './index.css'
import LocomotiveScroll from 'locomotive-scroll'
import '../node_modules/locomotive-scroll/dist/locomotive-scroll.css'


const Shelter = () =>
{
    const ref = useRef(null);

    useEffect(() => {
        if(ref) {
            const scroll = new LocomotiveScroll({
                el: ref.current!,
                smooth: true,
                direction: 'horizontal'
            });
        }

    
    
    }, []);
    


    return (
        <div className="heroWrapper">
        <div className="navbar">
            <div className="logo">
               <img src="images/logo.png" alt="logo"/>
            </div>
            <div className="menu">
                <ul>
                    <li><a href="index.html">Strona Główna</a></li>

                    <li><a href="">Kontakt</a></li>
                </ul>
            </div>
           
        </div>
        <div className="hero">
            <div className="heroText">
                <h1>Schronisko Klimczok</h1>
                <button>Przejdź dalej</button>
            </div>
        </div>
        <div className="scroll-container" data-scroll-container ref={ref}>
            <div className="scroll-section" data-scroll-section>
                <div className="content">
                    <h2>Klimczok</h2>
                    <p>Nazwa schroniska nawiązuje do szczytu Klimczoka, znajdującego się w odległości 700 m na zachód od budynku schroniska.</p>
                </div>
            </div>
        </div>
    </div>
        
    )
}
export default Shelter