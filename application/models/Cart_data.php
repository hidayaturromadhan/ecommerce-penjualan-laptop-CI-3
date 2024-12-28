<?php
class Cart_data extends CI_Model
{
    public function get_cart_items($user_id)
    {
        $this->db->select('c.id_cart, p.nama_produk, p.harga, p.gambar, c.kuantitas');
        $this->db->from('cart c');
        $this->db->join('produk p', 'c.id_produk = p.id_produk');
        $this->db->where('c.id_user', $user_id);
        return $this->db->get()->result_array();
    }

    public function add_to_cart($id_user, $id_produk, $kuantitas)
    {
        // Periksa apakah produk sudah ada di cart user
        $this->db->where('id_user', $id_user);
        $this->db->where('id_produk', $id_produk);
        $existing_cart = $this->db->get('cart')->row_array();

        if ($existing_cart) {
            // Jika sudah ada, tambahkan jumlah kuantitas
            $this->db->set('kuantitas', 'kuantitas + ' . (int)$kuantitas, false);
            $this->db->where('id_cart', $existing_cart['id_cart']);
            $this->db->update('cart');
        } else {
            // Jika belum ada, tambahkan sebagai entri baru
            $this->db->insert('cart', [
                'id_user' => $id_user,
                'id_produk' => $id_produk,
                'kuantitas' => $kuantitas
            ]);
        }
    }

    public function update_quantity($id_cart, $quantity)
    {
        $this->db->set('kuantitas', $quantity);
        $this->db->where('id_cart', $id_cart);
        return $this->db->update('cart');
    }

    public function remove_item($id_cart)
    {
        $this->db->where('id_cart', $id_cart);
        return $this->db->delete('cart');
    }
}
?>