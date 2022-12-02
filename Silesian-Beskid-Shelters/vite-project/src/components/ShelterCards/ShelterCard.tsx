import React from 'react';
import ReactDOM from 'react-dom/client';
import AOS from 'aos';
import 'aos/dist/aos.css';
import { useEffect } from "react";

const ShelterCard = (props: {image_url : string, text : string , shelter_name : string, link : string}) => {

    const text = props.text;
    const image_url = props.image_url;
    const shelter_name = props.shelter_name;
    const link = props.link;

    useEffect(() => {
        AOS.init({ duration: 2000 });
      }, []);

    const backgroundImage = {
        backgroundImage: `url(${image_url})`,
    }
  
    return (
      <a href={link}> 
        <div className="card" id="card" data-aos="fade-in" data-aos-duration="650">
            <div className="card-image" style={backgroundImage}>

            </div>
            <div className="card-text">
                <span className="date"></span>
                <h2>{shelter_name}</h2>
                <p>{text}</p>
            </div>
        </div>
    </a> 

    )}
export default ShelterCard;