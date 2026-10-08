import type { PropertyDetails } from '@/types/property'

// Demonstration data and illustrative photos. Replace with your API response.
const photo = (id: string, url: string, alt: string) => ({ id, url, alt })
export const exampleProperty: PropertyDetails = {
  id: 'the-enclave', slug: 'the-enclave-kingsland', kind: 'Home', locality: 'Kingsland, Texas',
  title: "The Enclave, Kid's Play Zone, Game Room, Infinity Pool + Spa, 9 Mi to Winery",
  rating: 5, reviewCount: 27, bedroomsCount: 5, bedsCount: 9, bathrooms: 5.5, maxGuests: 18,
  highlight: 'Guests love the outdoor pool, hot tub, BBQ area and more.',
  operator: 'Operated by a Wander partner', operatorSubtitle: 'Trusted operators, vetted by Wander',
  description: "Wake up to Lake LBJ from your private infinity pool, spillover hot tub, and boat dock. This stunning five-bedroom, five-and-a-half-bath lakefront estate sleeps 18 with a gourmet kitchen, games room, dedicated children's play area, and two outdoor patios with fire pit. Enjoy spectacular waterfront views and a relaxing stay with family or friends.",
  photos: [
    photo('hero','https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=1600&q=85','Luxury home with outdoor swimming pool'),
    photo('pool','https://images.unsplash.com/photo-1572331165267-854da2b10ccc?w=900&q=85','Infinity swimming pool'),
    photo('living','https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=900&q=85','Bright living area'),
    photo('villa','https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?w=900&q=85','Modern villa interior'),
    photo('exterior','https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=900&q=85','Property exterior and terrace'),
  ],
  bedrooms: [
    { id:'bed-1', name:'Main bedroom', beds:'1 king bed', photo:photo('b1','https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=900&q=85','Main bedroom') },
    { id:'bed-2', name:'Bunk bedroom', beds:'4 bunk beds', photo:photo('b2','https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=900&q=85','Guest bedroom') },
    { id:'bed-3', name:'Bedroom 3', beds:'1 queen bed', photo:photo('b3','https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=900&q=85','Bedroom 3') },
  ],
  amenities: [
    { id:'pool', label:'Outdoor pool', icon:'waves' }, { id:'spa', label:'Hot tub', icon:'bath' },
    { id:'bbq', label:'BBQ area', icon:'flame' }, { id:'parking', label:'Free parking', icon:'car-front' },
    { id:'wifi', label:'Wi-Fi', icon:'wifi' }, { id:'toys', label:'Toys', icon:'puzzle' },
    { id:'smoke', label:'Smoke detector', icon:'shield-alert' }, { id:'ac', label:'Air conditioning', icon:'air-vent' },
    { id:'kitchen', label:'Kitchen', icon:'cooking-pot' }, { id:'tv', label:'Television', icon:'tv' },
  ],
  reviews: [
    { id:'r1', author:'Annette', rating:5, date:'July 2025', body:'We had a great stay at this home! It was incredibly clean, comfortable, and well-equipped. Even though the weather wasn’t ideal, the host went above and beyond to help. We would absolutely stay here again!' },
    { id:'r2', author:'Elise', rating:5, date:'May 2025', body:'Can’t describe how amazing our weekend was. The house was spotless and so comfortable for our group. Waking up to the lake every morning was the best! The host was super responsive.' },
    { id:'r3', author:'Jose', rating:5, date:'April 2025', body:'Excellent property, clean and fully equipped. Personalised attention and prompt responses from the staff. Excellent communication throughout our stay. Highly recommended!' },
  ],
  location: { address:'Kingsland, Texas 78639, US', latitude:30.6585, longitude:-98.4406, description:'Nestled in the heart of picturesque Texas Hill Country, this lakefront retreat is surrounded by beautiful landscapes and offers an outstanding location for a peaceful getaway.' },
  cancellationPolicy:'Cancel within 24 hours for a full refund. Further refunds depend on the booking date and cancellation deadline.',
  rules:[{id:'pets',label:'Pets not allowed',icon:'paw-print'},{id:'smoking',label:'No smoking – fees may apply',icon:'cigarette-off'},{id:'events',label:'Events not allowed',icon:'party-popper'}],
  checkInAfter:'4:00 pm', checkOutBefore:'11:00 am',
  quote: {currency:'USD',total:2686,nights:3,competitor:{name:'Airbnb',total:2925}},
}
