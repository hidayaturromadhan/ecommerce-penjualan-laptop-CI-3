<?php
class Transaksi_data extends CI_Model {

    // Mengambil semua data transaksi
    public function get_all_transaksi() {
        // Mengambil semua data dari tabel transaksi
        $query = $this->db->get('transaksi');
        return $query->result_array(); // Mengembalikan data sebagai array
    }
    
    // Update status transaksi
    public function update_status($id_transaksi, $status) {
        // Menyusun data untuk update
        $data = ['status' => $status];

        // Melakukan update status berdasarkan ID transaksi
        $this->db->update('transaksi', $data, ['id_transaksi' => $id_transaksi]);
    }

    // Menyimpan data transaksi
    public function save_transaction($transaction_data) {
        $this->db->insert('transaksi', $transaction_data);
        return $this->db->insert_id(); // Mengembalikan ID transaksi yang baru dibuat
    }

    // Menyimpan detail transaksi
    public function save_transaction_details($detail_data) {
        $this->db->insert('detail_transaksi', $detail_data);
    }

    // Mengambil bukti pembayaran (opsional, jika diperlukan untuk fitur lain)
    public function get_payment_proof($transaction_id) {
        // Mengembalikan data bukti pembayaran (jika ada)
        return $this->db->get_where('transaksi', ['id_transaksi' => $transaction_id])->row()->payment_proof ?? null;
    }

    // Update bukti pembayaran (jika perlu, jika Anda ingin menambahkannya lagi nanti)
    public function update_payment_proof($transaction_id, $payment_proof) {
        $this->db->update('transaksi', ['payment_proof' => $payment_proof], ['id_transaksi' => $transaction_id]);
    }
}
?>
