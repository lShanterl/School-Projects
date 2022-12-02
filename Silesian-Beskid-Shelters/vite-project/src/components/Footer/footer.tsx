import { FaDiscord } from 'react-icons/fa';
import { FaFacebookF } from 'react-icons/fa';
import { FaInstagram } from 'react-icons/fa';
import { FaYoutube } from 'react-icons/fa';




const Footer = () => {
    return (
    <div className="wrap">
        <div className="semifooter">
            <div className="icon"><FaDiscord /></div>
            <div className="icon"><FaFacebookF /></div>
            <div className="icon"><FaInstagram /></div>
            <div className="icon"><FaYoutube /></div>
        </div>
        <footer className="footer">
            
            <div className="footer-text"></div>
        
            <div className="footerText">
                <p>&copy; Bartosz Starzyk 2022</p>
            </div>
        </footer>
    </div>
    
    )
}
export default Footer
        