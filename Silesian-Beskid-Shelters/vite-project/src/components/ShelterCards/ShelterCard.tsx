import React from 'react';
import ReactDOM from 'react-dom/client';
import { motion } from "framer-motion"
import { useEffect } from "react";

const ShelterCard = (props: {image_url : string, text : string , shelter_name : string, link : string}) => {

    const text = props.text;
    const image_url = props.image_url;
    const shelter_name = props.shelter_name;
    const link = props.link;

    const backgroundImage = {
        backgroundImage: `url(${image_url})`,
    }
  
    return (
      <a href={link}> 
        <motion.div initial={{ opacity: 0 }}
                        whileInView={{ opacity: 1 }}
                        transition={{ anticipation: 0.5, duration: 0.5 }} className="card" id="card">
            <div className="card-image" style={backgroundImage}/>
            <div className="card-text">
                <h2>{shelter_name}</h2>
                <p>{text}</p>
            </div>
        </motion.div>
    </a> 

    )}
export default ShelterCard;