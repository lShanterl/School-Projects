import motion from "framer-motion";
import { useEffect } from "react";
import { useAnimation } from "framer-motion";
import { useInView } from "react-intersection-observer";

const Gallery = (prop : {image_url : string}) => {

    const image_url = prop.image_url;
    const style={
        backgroundImage: `url(${image_url})`,
    }
    return (
        <div>
            <img src="" alt="" style = {style} />
        </div>
    );
    };